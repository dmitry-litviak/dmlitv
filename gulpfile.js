var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var bower_path = __dirname + '/' + elixir.config.bowerDir;

    elixir(function(mix) {
    mix.less('app.less', false, {
        paths: [
            bower_path
        ]
    })

    .coffee()

    .scripts([
        'jquery/dist/jquery.min.js',
        'bootstrap/dist/js/bootstrap.min.js',
        'select2/select2.min.js',
        'sidr/jquery.sidr.min.js',
        'bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js',
        'nprogress/nprogress.js'
    ], 'public/js/vendor.js', elixir.config.bowerDir)

    .copy('resources/assets/fonts', 'public/fonts')
    .copy(elixir.config.bowerDir + '/bootstrap/fonts', 'public/fonts')
    .copy(elixir.config.bowerDir + '/font-awesome/fonts', 'public/fonts')
    .copy(elixir.config.bowerDir + '/select2/select2x2.png', 'public/css/select2x2.png');

    mix.version('js/app.js');
});
