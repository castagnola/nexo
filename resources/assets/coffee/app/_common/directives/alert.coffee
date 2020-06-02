class NexoAlert extends Directive
  constructor: ($timeout) ->
    directive = {
      restrict: 'EAC',
      scope: {
        type: '=nexoAlertType',
        message: '=nexoAlertMessage'
        title: '=nexoAlertTitle'
      }
      link: (scope, element) ->
        unless _.isEmpty(scope.message)
          switch scope.type
            when 'success' then toastr.success(scope.message, scope.title or null)
            when 'error' then toastr.error(scope.message, scope.title or null)
    }

    return directive