const mix = require('laravel-mix');

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

mix.copyDirectory('resources/assets/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/js/plugins', 'public/js/plugins');
mix.copyDirectory('resources/assets/sass/common/plugins', 'public/css/plugins');

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/pages/home.js', 'public/js/pages')
    .js('resources/assets/js/pages/checkout.js', 'public/js/pages')

   .sass('resources/assets/sass/pages/thank.scss', 'public/css/pages')
   .sass('resources/assets/sass/pages/checkout.scss', 'public/css/pages')
   .sass('resources/assets/sass/pages/home.scss', 'public/css/pages')
   .sass('resources/assets/sass/app.scss', 'public/css');

