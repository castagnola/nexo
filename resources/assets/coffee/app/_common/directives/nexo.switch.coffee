class NexoSwitch extends Directive
  constructor: ($timeout) ->
    link = (scope, element) ->

      onSwitchChange = ->
        scope.$apply ->
          scope.onSwitchChange.call()

      if scope.checked
        element.attr('checked', true)

      $timeout ->
        $(element).bootstrapSwitch({
          onSwitchChange : onSwitchChange
        })

    directive =
      scope:
        checked: '=nexoSwitch'
        onSwitchChange: '=nexoSwitchOnChange'
      link: link

    return directive