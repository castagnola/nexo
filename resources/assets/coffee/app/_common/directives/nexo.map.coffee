class NexoMap extends Directive
  constructor: (TEMPLATE_URL) ->
    directive = {
      restrict: 'EAC'
      templateUrl: commonTemplateUrl("map/map")
      controller: 'nexoMapController'
      controllerAs: 'vm'
      scope: {
        service: '=nexoMapService'
      }
    }

    return directive