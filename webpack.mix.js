const mix = require('laravel-mix');

mix.js('resources/js/app.js','public/js')
    .sass('resources/sass/app.scss','public/css')
    .js('resources/js/app2.js','public/js/www')
    .sass('resources/sass/app2.scss','public/css/www');
mix.extract();
mix.version();