let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('sources/js/bundle.js', 'assets/js')
    .sass('sources/sass/bundle.scss', 'assets/css')
    .copy('sources/fonts', 'assets/fonts')
    .copy('sources/img', 'assets/fonts')
    .options({
        postCss: [
            require('autoprefixer')({
                browsers: ['last 13 versions'],
            }),
            require('css-mqpacker'),
        ],
        processCssUrls: false
    });

