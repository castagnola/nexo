class App extends App
  constructor: ->
    return [
      'ngSanitize'
      'ngMessages'
      'ngAnimate'
      'ngFileUpload'
      'ngCropper'
      'ngAside',
      'ngStorage',

      'angularMoment',
      'angularSpinner',
      'angular-ladda',
      'xeditable',

      'js-data',

      'ui.bootstrap'
      'ui.bootstrap.showErrors'
      'ui.grid'
      'ui.grid.resizeColumns',
      'ui.grid.autoResize'
      'ui.select',
      'ui.router',

      'uiGmapgoogle-maps',
      'chart.js',
      'btford.socket-io',
      'kendo.directives',

      'formly',
      'formlyBootstrap',

      'mgo-angular-wizard',
      'vs-repeat',

      'datatables',
      'datatables.bootstrap',
      'datatables.buttons'
      'datatables.fixedcolumns',
      'frapontillo.bootstrap-switch',
      'angular-jwt',

      'permission'
    ]


window.templateUrl = (name) ->
  return "/ui/template?name=#{name}"

window.commonTemplateUrl = (name) ->
  return "/ui/common-template?name=#{name}"

window.markerUrl = (name) ->
  return "/assets/images/markers/#{name}.png"


