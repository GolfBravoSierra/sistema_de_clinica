# Composer dependecies installation
FROM composer as composer-build

WORKDIR /var/www/html/

COPY composer.json composer.lock /var/www/html/

RUN mkdir -p /var/www/html/database/{factories, seeders} \
&& composer install --no-dev --prefer-dist --no-scripts --no-autoloader --no-progress --ignore-platform-reqs

# Npm dependencies installation
FROM node:20-alpine AS npm-build

WORKDIR /var/www/html/

COPY package.json package-lock.json vite.config.js /var/www/html/
COPY resources /var/www/html/resources/
COPY public /var/www/html/public/

RUN npm ci
RUN npm run build

# Production image
FROM php:8.2-fpm-buster

# Arguments
ARG user=laravel
ARG uid=1000

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Get latest Composer
COPY --chown=$user --from=composer-build /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

COPY --chown=$user --from=composer-build /var/www/html/vendor/ /var/www/html/vendor/
COPY --chown=$user --from=npm-build /var/www/html/public/ /var/www/html/public/
COPY --chown=$user . /var/www/html

# Set working directory
WORKDIR /var/www/html/

USER $user

RUN composer dump -o \
&& composer check-platform-reqs