'use strict';

const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

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

let bowerScripts = [
    './bower_components/jquery/dist/jquery.min.js',
    './bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    './bower_components/bootstrap-select/js/bootstrap-select.js'
];

elixir(mix => {
    mix.sass('app.sass')
       .sass([
           'dashboard.sass'
       ], './public/css/dashboard.css')
       .scripts(bowerScripts.concat([
           'libs/prism.js',
           'libs/tinymce_config.js',
           'components/ajaxRequest.js',
           'components/markAnswerAjax.js',
           'components/flashMessageAlert.js',
           'components/subscribeToAjax.js',
           'components/dashboardSidebar.js'
       ]))
       .copy('./bower_components/tinymce', './public/assets/tinymce');
});
