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
    .js('resources/js/admin/scripts.js', 'public/js/admin')
    .js('resources/js/admin/datatables-simple-demo.js', 'public/js/admin')
    .js('resources/js/admin/assets/chart-area-demo.js', 'public/js/admin/assets')
    .js('resources/js/admin/assets/chart-bar-demo.js', 'public/js/admin/assets')
    .js('resources/js/admin/assets/chart-pie-demo.js', 'public/js/admin/assets')
    .js('resources/js/admin/assets/datatables-demo.js', 'public/js/admin/assets')
    // .postCss('resources/css/admin/styles.css','public/css/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/styles.scss', 'public/css/admin');