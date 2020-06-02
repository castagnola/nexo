var elixir = require('laravel-elixir');
var requireDir = require('require-dir');

require('laravel-elixir-useref');
requireDir('./tasks');


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
elixir(function (mix) {

    mix.less(['app.less'], 'public/assets/css/app.css');

    // Bower styles
    mix.styles([
        'css-utils/utils.css',
        'animate.css/animate.css',
        'ng-cropper/dist/ngCropper.all.css',
        'angular-xeditable/dist/css/xeditable.css',
        'angular-chart.js/dist/angular-chart.min.css',
        'ladda/dist/ladda-themeless.min.css',
        'bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'nouislider/distribute/nouislider.min.css',
        'ui-select/dist/select.min.css',
        'angular-aside/dist/css/angular-aside.min.css',
        'clockpicker/dist/bootstrap-clockpicker.min.css',

        // Datatables

        'angular-datatables/dist/plugins/bootstrap/datatables.bootstrap.min.css'

    ], 'public/assets/css/vendor.css', 'bower_components');

    mix.styles('plugins/**/*.css', 'public/assets/css/plugins.css', 'resources/assets/css');

    mix.scripts([
        'api-check/dist/api-check.min.js',
        'is_js/is.min.js',
        'node-uuid/uuid.js',
        'lodash/lodash.min.js',
        'moment/min/moment.min.js',
        'moment/locale/es.js',
        'moment-range/dist/moment-range.js',
        'spin.js/spin.js',
        'ladda/dist/spin.min.js',
        'ladda/dist/ladda.min.js',
        'angular/angular.js',
        'Chart.js/Chart.min.js',
        'js-data/dist/js-data.js',
        'js-data-angular/dist/js-data-angular.js',
        'js-data-http/dist/js-data-http.js',
        'validate/validate.min.js',
        'angular-chart.js/dist/angular-chart.min.js',
        'angular-messages/angular-messages.js',
        'angular-sanitize/angular-sanitize.js',
        'angular-animate/angular-animate.js',
        'angular-moment/angular-moment.js',
        'angular-xeditable/dist/js/xeditable.js',
        'angular-spinner/angular-spinner.min.js',
        'angular-ladda/dist/angular-ladda.min.js',
        'angular-bootstrap/ui-bootstrap.min.js',
        'angular-bootstrap/ui-bootstrap-tpls.min.js',
        'angular-bootstrap-show-errors/src/showErrors.js',
        'angular-bootstrap-switch/dist/angular-bootstrap-switch.min.js',
        'angular-google-maps/dist/angular-google-maps.js',
        'ng-file-upload/ng-file-upload-all.js',
        'ng-cropper/dist/ngCropper.all.js',
        'bootstrap-timepicker/js/bootstrap-timepicker.js',
        'bootbox/bootbox.js',
        'angular-ui-grid/ui-grid.min.js',
        'bootstrap-switch/dist/js/bootstrap-switch.min.js',
        'nouislider/distribute/nouislider.min.js',
        'ui-select/dist/select.min.js',
        'excellentexport/excellentexport.min.js',
        'angular-socket-io/socket.min.js',
        'angular-formly/dist/formly.min.js',
        'angular-formly-templates-bootstrap/dist/angular-formly-templates-bootstrap.min.js',
        'angular-ui-router/release/angular-ui-router.min.js',
        'angular-wizard/dist/angular-wizard.min.js',
        'angular-vs-repeat/src/angular-vs-repeat.min.js',
        'jQuery.dotdotdot/src/js/jquery.dotdotdot.min.js',
        'angular-aside/dist/js/angular-aside.min.js',
        'angular-jwt/dist/angular-jwt.min.js',
        'ngstorage/ngStorage.min.js',
        'angular-permission/dist/angular-permission.js',

        // Datatables
        'angular-datatables/dist/angular-datatables.min.js',
        'angular-datatables/dist/plugins/bootstrap/angular-datatables.bootstrap.min.js',
        'angular-datatables/dist/plugins/buttons/angular-datatables.buttons.min.js',
        'angular-datatables/dist/plugins/colreorder/angular-datatables.colreorder.min.js',
        'angular-datatables/dist/plugins/scroller/angular-datatables.scroller.min.js',
        'angular-datatables/dist/plugins/fixedcolumns/angular-datatables.fixedcolumns.min.js',

        // Clockpicker
        'clockpicker/dist/bootstrap-clockpicker.min.js',

    ], 'public/assets/js/vendor.js', 'bower_components');

    mix.scripts([
        'jquery.hoverIntent.js',
        'socket.io.js',
        'datatables/jquery.dataTables.min.js',
        'datatables/dataTables.buttons.min.js',
        'datatables/dataTables.colReorder.min.js',
        'datatables/dataTables.fixedColumns.min.js',
        'datatables/buttons.colVis.min.js',
        'datatables/buttons.html5.min.js',

    ], 'public/assets/js/plugins.js', 'resources/assets/js/plugins');


    mix.copy('resources/assets/js/plugins/datatables/spanish.json', 'public/assets/js/spanish.json');


    mix.copy('resources/assets/plugins/**', 'public/assets/plugins');
    mix.copy('resources/assets/css/**', 'public/assets/css');
    mix.copy('resources/assets/js/**', 'public/assets/js');
    mix.copy('resources/assets/img/**', 'public/assets/images');

    mix.copy('bower_components/datatables/media/images/**', 'public/assets/images');
    mix.copy('bower_components/**/*.{woff,eot,svg,ttf}', 'public/assets/fonts');

    mix.task('app-coffee:common', 'resources/assets/coffee/app/_common/**/*.coffee');
    mix.task('app-coffee:admin', 'resources/assets/coffee/app/admin/**/*.coffee');
    mix.task('app-coffee:client', 'resources/assets/coffee/app/client/**/*.coffee');
});




