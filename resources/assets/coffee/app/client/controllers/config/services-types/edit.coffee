class ConfigServicesTypesEdit extends Controller
  constructor: ($scope, $stateParams, $state, ServiceType, ServiceTypeForm) ->
    onSubmitFinally = ->
      vm.submitting = false

    onSubmitSuccess = (response) ->
      toastr.success "La categoría #{response.name} del servicio ha sido actualizada correctamente"
      $state.go 'config.servicesTypes'

    onSubmit = ->
      if vm.form.$valid
        data = angular.copy vm.model
        ServiceType.create(data).then(onSubmitSuccess).finally(onSubmitFinally)

    vm = this
    vm.fields = ServiceTypeForm
    vm.editMode = true
    vm.onSubmit = onSubmit


    ServiceType.bindOne($stateParams.serviceTypeId, $scope, 'serviceType', (cb, data) ->
      vm.model = angular.copy(data)
    )