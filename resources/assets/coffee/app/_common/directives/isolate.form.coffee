class IsolateForm extends Directive
  constructor: () ->
    return {
    restrict: 'A'
    require: '?form'
    link: (scope, elm, attrs, ctrl) ->
      elm.on 'keyup keypress', (e) ->
        code = e.keyCode or e.which
        if code == 13
          e.preventDefault()
          return false
        return


      if !ctrl
        return
      # Do a copy of the controller
      ctrlCopy = {}
      angular.copy ctrl, ctrlCopy
      # Get the parent of the form
      parent = elm.parent().controller('form')
      # Remove parent link to the controller
      parent.$removeControl ctrl
      # Replace form controller with a "isolated form"
      isolatedFormCtrl =
        $setValidity: (validationToken, isValid, control) ->
          ctrlCopy.$setValidity validationToken, isValid, control
          parent.$setValidity validationToken, true, ctrl
          return
        $setDirty: ->
          elm.removeClass('ng-pristine').addClass 'ng-dirty'
          ctrl.$dirty = true
          ctrl.$pristine = false
          return
      angular.extend ctrl, isolatedFormCtrl
      return

    }