class NexoChangeStatus extends Directive
  constructor: (CSRF_TOKEN) ->
    directive =
      restrict: 'EAC'
      link: ($scope, element, params) ->
        angular.element(element).click (event) ->
          event.preventDefault()

          bootbox.confirm(params.confirmText, (answer) ->
            if true is answer
              token = CSRF_TOKEN
              form = $("<form method='POST' action='#{params.url}'>
                          <input class='hide' type='text' name='_token' value='#{token}'/>
                          <input class='hide' type='text' name='status' value='#{params.newStatus}'/>
                          <input class='hide' type='text' name='return_url' value='#{params.returnUrl}'/>
                        </form>")
              form[0].submit()
          )


    return directive