
# Projeto-Sistema-de-Clínica

### Passo a passo
Clone Repositório criado a partir do template, entre na pasta e execute os comandos abaixo:

Crie o Arquivo .env
```sh
cp .env.example .env
```


Suba os containers do projeto
```sh
docker compose up -d
```


Acessar o container do laravel
```sh
docker compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Para os testes funcionarem
```sh
php artisan config:cache
php artisan config:clear
```

Migrar as tabelas mysql
```sh
php artisan migrate
```

Ou para o intuito de testes usar
```sh
php artisan migrate --seed
```


Acessar o container do node
```sh
docker compose exec node /bin/sh
```


Acessar o app pelo electron
```sh
npm start
```