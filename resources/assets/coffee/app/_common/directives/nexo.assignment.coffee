class NexoAssignmentForm extends Directive
  constructor: () ->
    link = ($scope, element) ->
      ''

    directive =
      scope:
        service: '=nexoAssignmentForm'

      templateUrl: templateUrl('services/assignment-form')
      controller: 'servicesAssignmentFormController'
      controllerAs: 'vm'
      link: link


    return directive