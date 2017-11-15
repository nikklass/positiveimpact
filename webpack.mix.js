let mix = require('laravel-mix');

/*mix.autoload({
    jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"]
});*/

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
