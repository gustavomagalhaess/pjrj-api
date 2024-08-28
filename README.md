# Aplicação de cadastro de livros

## Configuração de ambiente

### [Instalar o docker](https://docs.docker.com/engine/install/)

### Criar o .env file
```
cp .env-example .env
```

### Iniciar o docker
```
docker compose up
```

### Acessar o container do laravel
```
docker container exec -it [nome do container laravel] bash
```

### Instalar as dependências
```
composer install
```

### Executar o comando
```
php artisan key:generate
```

### Criar os bancos
```
php artisan migrate
```

### Criar popular a base
```
php artisan db:seed AutorSeeder
php artisan db:seed AssuntoSeeder
php artisan db:seed LivroSeeder
```

### Executar os testes
```
php artisan test
```
