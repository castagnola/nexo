class ServiceReasign extends Controller
  constructor: ($scope, $state, $stateParams, Service, ServiceForm) ->
    onSubmitFinally = ->
      vm.submitting = false

    onSubmitSuccess = (response) ->
      toastr.success("El servicio ##{response.code} ha sido reasignado correctamente")
      $state.go 'services'

    onSubmit = ->
      vm.submitting = true

      data = _.pick(vm.model, ['assignments', 'users', 'start_at', 'end_at', 'assignment_type', 'date_type'])

      $scope.service.DSUpdate(data, {

      }).then(onSubmitSuccess).finally(onSubmitFinally)

    vm = this
    vm.fields = ServiceForm
    vm.onSubmit = onSubmit


    Service.bindOne($stateParams.serviceId, $scope, 'service', (cb, data) ->
      model = angular.copy(data)


      model.start_at = moment(model.start_at.date).toDate()
      model.end_at = moment(model.end_at.date).toDate()
      model.assignments = _.map(_.get(model, 'assignments.data'), (assignment) ->
        return assignment.user
      )
      model.users = _.get(model, 'users.data') or []


      vm.currentDate = {
        start: angular.copy(model.start_at),
        end: angular.copy(model.end_at),
      }
      vm.model = model
    )