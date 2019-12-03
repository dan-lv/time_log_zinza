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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/user_scripts.js', 'public/js/user_scripts.js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/mystyle.scss', 'public/css/style.css')
   .copyDirectory('resources/images', 'public/images')
   .copy('node_modules/moment/moment.js', 'public/js/moment.js')
   .version();
