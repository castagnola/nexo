class Clockpicker extends Directive
  constructor: () ->
    link = (scope, element, attributes) ->
      scope.options or= {
        autoclose: true
        twelvehour: true
        donetext: 'Seleccionar'
      }
      $(element).clockpicker(scope.options)


    directive =
      restrict: 'EAC'
      link: link
      scope: {
        options: '=clockpickerOptions'
      }


    return directive