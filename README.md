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

## Tree

- `app`
  - `Casts` Serializer model
  - `Console` Script command
  - `Helpers` Global functions
  - `Http`
    - `Controllers`
      - `Api` Connected inside api
      - `Auth` Autenticated
      - `---modules--`
  - `Lib` One Module
  - `Mail` Section mailable
  - `Model`
      - `---modules--`
  - `Presenters` They are classes with friendly functions that represent models
      - `---modules--`
  - `Services` Logic outside of controllers and models
- `resources`
  - `sass`
  - `js` Include vue
  - `lang` Translate es, en, etc..
  - `views`
    - `---modules--`




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