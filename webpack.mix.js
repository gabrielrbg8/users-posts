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

mix
    .sass('resources/views/scss/style.scss', 'public/css/style.css')

    .scripts([
        'node_modules/jquery/dist/jquery.js',
    ], 'public/js/jquery.js')

    .scripts([
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
    ], 'public/js/bootstrap.js')

    .scripts([
        'resources/js/script.js'
    ], 'public/js/script.js')
    .styles([
        'resources/views/site/css/style.css'
    ], 'public/site/css/style.css')

    .styles([
        'resources/views/admin/css/style.css'
    ], 'public/admin/css/style.css')

    .styles([
        'resources/views/layouts/style.css'
    ], 'public/layouts/css/style.css')

    .version();
