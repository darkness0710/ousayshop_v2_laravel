const mix = require('laravel-mix');

mix.styles([
    'resources/css/client/material-kit.min.css',
    'resources/css/client/app.css',
], 'public/css/client.css');

mix.js([
    'resources/js/client/bootstrap.js',

    'resources/js/client/core/popper.min.js',
    'resources/js/client/bootstrap-material-design.js',
    // 'resources/js/client/core/jquery.min.js',
    // 'resources/js/client/plugins/moment.min.js',
    'resources/js/client/plugins/bootstrap-selectpicker.js',
    'resources/js/client/plugins/bootstrap-tagsinput.js',
    'resources/js/client/plugins/jasny-bootstrap.min.js',
    'resources/js/client/plugins/jquery.flexisel.js',
    'resources/js/client/plugins/bootstrap-datetimepicker.min.js',
    'resources/js/client/plugins/nouislider.min.js',
    'resources/js/client/material-kit.js',

], 'public/js/client.js');


mix.js('resources/js/admin/app.js', 'public/js/admin.js')
    .sass('resources/sass/app.scss', 'public/css/admin.css')
    .sourceMaps();
