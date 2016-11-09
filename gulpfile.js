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

var bowerScripts = [
    './bower_components/bootstrap-select/js/bootstrap-select.js',
];

elixir(mix => {
    mix.sass('app.sass')
       .webpack('app.js')
       .scripts(bowerScripts.concat([
           'libs/prism.js',
           'libs/tinymce_config.js',
           'components/markQuestionAjax.js',
           'components/flashMessageAlert.js',
       ]))
       .copy('./bower_components/tinymce', './public/assets/tinymce');
});
