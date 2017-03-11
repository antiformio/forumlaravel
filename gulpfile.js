var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

    /**
     * Incorporar os ficheiros de css que estão em resources/assets/css/libs
     */
    .styles([

        'libs/bootstrap.css',
        'libs/bootstrap.min.css',
        'libs/blog-post.css',
        'libs/font-awesome.css',
        'libs/metisMenu.css',
        'libs/sb-admin-2.css',
        'libs/styles.css'




        /**
         * Aqui é o ficheiro onde vão ser compilados todos os ficheiros em cima
         *      se por acaso não existir, cria-o
         */
    ], './public/css/libs.css')




    /**
     * Aqui estão os scripts da pasta resources/assets/js/libs
     */
        .scripts([

            'libs/jquery.js',
            'libs/bootstrap.js',
            'libs/bootstrap.min.js',
            'libs/metisMenu.js',
            'libs/sb-admin-2.js',
            'libs/scripts.js'



            /**
             *Aqui é o ficheiro onde vão ser compilados todos os scripts enunciados em cima,
             *      se a pasta nao existir, então cria-a
             */
        ], './public/js/libs.js' )




});
