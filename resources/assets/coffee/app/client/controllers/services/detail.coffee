class ServicesDetail extends Controller
  constructor: ($log, $scope, $state, $stateParams, Service, ServiceStatus) ->
    bind = ->
      Service.bindOne($stateParams.serviceId, $scope, 'service')
      ServiceStatus.bindAll({}, $scope, 'statuses')


    onChangeStatusFinally = ->
      vm.changingStatus = false

    onChangeStatusSuccess = (response) ->
      toastr.success "El estado ha sido cambiado a #{response.status.name}."

    onChangeStatus = (statusId) ->
      data = {
        service_status_id: statusId
      }

      $log.debug 'Cambiando de estado', statusId, data

      vm.changingStatus = true

      $scope.service.DSUpdate(data).then(onChangeStatusSuccess).finally(onChangeStatusFinally)


    vm = this
    vm.onChangeStatus = onChangeStatus

    bind()




