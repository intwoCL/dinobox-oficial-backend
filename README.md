Es un sistema de delivery escalable
# Devivery-backend INTWO

## Team project

Laravel Framework 8.0
VERSION PROJECT 2021.0

#### Repositorio
```shell
composer install
```

Copy .env
```shell
cp .env.example .env
```

# NOTA: Este codigo hace todo de una
```shell

php artisan migrate:fresh --seed

```
## Usuarios

| TIPO  | username  | password  |
|---|---|---|
| Admin  | admin  | 123456  |
| Usuario  | usuario1  | 123456 |



### Inicial con forma de seed
```shell
php artisan storage:link
composer dump-autoload

php artisan migrate:fresh --seed
```

### Inicial laravel-mix mode dev
```shell
npm install
npm run dev
```

## Test
```shell
vendor\bin\phpunit
```

## Code
```shell
vendor\bin\phpstan analyse

composer require --dev phpstan/phpstan
vendor/bin/phpstan analyse


vendor\bin\phpstan analyse app
vendor\bin\phpstan analyse resource
```