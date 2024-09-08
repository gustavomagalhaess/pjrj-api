# Books CRUD application

## Enviroment configuration

### [Install docker](https://docs.docker.com/engine/install/)

### Create .env files
```
cp .env-example .env
cp .env-example .env-testing

Into the .env-testing sets to DB_DATABASE=testing
```

### Init docker
```
docker compose up
```

### Access laravel container
```
docker container exec -it [laravel container name] bash
```

### Install dependencies
```
composer install
```

### Create application key
```
php artisan key:generate
```

### Create the database
```
php artisan migrate
php artisan migrate --env=testing
```

### Create fake records on database
```
php artisan db:seed AuthorSeeder
php artisan db:seed SubjectSeeder
php artisan db:seed BookSeeder
```

### Execute the tests
```
php artisan test
```
