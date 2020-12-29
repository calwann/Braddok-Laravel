const mix = require("laravel-mix");

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
    // Bootstrap
    //.js("resources/js/app.js", "public/js")
    //.sass("resources/sass/app.scss", "public/css")

    // Materialize
    .js("node_modules/materialize-css/dist/js/materialize.min.js", "public/js")
    .sass("node_modules/materialize-css/sass/materialize.scss", "public/css")

    // CSS and JS
    .styles("resources/css/style.css", "public/css/style.css")
    .js("resources/js/functions.js", "public/js/functions.js");
