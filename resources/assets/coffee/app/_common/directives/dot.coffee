class Dot extends Directive
  constructor: () ->
    link = (scope, element) ->
      element.dotdotdot(scope.options or {})

    directive =
      restrict: 'EAC'
      link: link
      scope:
        options: '=dot'


    return directive