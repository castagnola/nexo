class NexoDeleteButton extends Directive
  constructor: (CSRF_TOKEN) ->
    directive =
      restrict: 'EAC'
      link: ($scope, element, params) ->
        angular.element(element).click (event) ->
          event.preventDefault()

          bootbox.confirm('¿Está seguro de que quiere ejecutar esta acción?', (answer) ->
            if true is answer
              token = CSRF_TOKEN
              form = $("<form method='POST' action='#{params.href}'>
                          <input name='_method' type='text' class='hide' value='DELETE' />
                          <input class='hide' type='text' name='_token' value='#{token}'/>
                        </form>")

              form[0].submit()
          )


    return directive