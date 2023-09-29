const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 let productionSourceMaps = false;

 mix.js('resources/js/home.js', 'public/assets/js').sourceMaps(productionSourceMaps, 'source-map')
 .react()
 .sass('resources/sass/home.scss', 'public/assets/css', {
     implementation: require('node-sass')
 })
 .webpackConfig(require('./webpack.config'));

 mix.js('resources/js/user.js', 'public/assets/js').sourceMaps(productionSourceMaps, 'source-map')
 .react()
 .webpackConfig(require('./webpack.config'));

 mix.js('resources/js/admin.js', 'public/assets/js').sourceMaps(productionSourceMaps, 'source-map')
    .react()
    .sass('resources/sass/admin/admin.scss', 'public/assets/admin/css', {
        implementation: require('node-sass')
    })
    .webpackConfig(require('./webpack.config'));



// mix.js('resources/js/app.js', 'public/js')
//     .react()
//     .postCss('resources/css/app.css', 'public/css', [
//         require('postcss-import'),
//         require('tailwindcss'),
//         require('autoprefixer'),
//     ])
//     .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
