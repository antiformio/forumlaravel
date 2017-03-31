/**
 * Created by filipemartins on 30/03/17.
 */
const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');



mix.styles([
    'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/libs/bootstrap.min.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/blog-post.css'


], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/bootstrap.min.js',
    'resources/assets/js/libs/scripts.js',
    'resources/assets/js//libs/sb-admin-2.js'



], 'public/js/libs.js');