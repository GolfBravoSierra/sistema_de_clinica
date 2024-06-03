
# Projeto-Sistema-de-Clínica

### Requerimentos para rodar o app

- Docker
- Node with npm
- Minikube
- Kubectl

### Passo a passo para subir o site
Clone Repositório criado a partir do template, entre na pasta e execute os comandos abaixo:

Inicie o minikube
```sh
minikube start
```

Suba os pods do projeto
```sh
kubectl apply -f kube
```

Para melhor visualização do que está acontecendo usar
```sh
minikube dashboard
```

Acessar o container do laravel

(Troque onde tem nomeDoPod pelo pod que, nesse caso, queremos um pod com nome parecido a app-612387961)
```sh
kubectl get pods -n sisclinica
kubectl -- exec --stdin --tty nomeDoPod -- bash -n sisclinica
```

Migrar as tabelas mysql
```sh
php artisan migrate
```

Ou para o intuito de testes usar
```sh
php artisan migrate --seed
```

De volta ao terminal normal, agora você pode rodar o serviço que desejar
```sh
kubectl get services -n sisclinica
kubectl service app-svc -n sisclinica
```

### Passo a passo para renderizar o site via electron
Instalar a dependência do electron
```sh
npm install electron --save-dev
```

Acessar o app pelo electron
```sh
npm start
```