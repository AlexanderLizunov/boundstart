let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/admin/admin.scss', 'public/css/admin/style.css');
mix.sass('resources/assets/sass/wiki/style.scss', 'public/css/wiki/style.css');
// .js('resources/assets/js/app.js', 'public/js/script.js');
