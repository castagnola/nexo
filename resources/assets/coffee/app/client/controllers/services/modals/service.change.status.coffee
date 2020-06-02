class ServiceChangeStatusModal extends Controller
  constructor: ($scope, $modalInstance, service, ServiceStatus) ->
    $scope.service = service
    $scope.formData = {}

    params = {
      where: {
        id: {
          '!=': service.status.data.id
        }
      }
    }

    ServiceStatus.bindAll(params, $scope, 'statuses')

    $scope.cancel = ->
      $modalInstance.dismiss('cancel')

    $scope.submit = ->
      $scope.$broadcast('show-errors-check-validity')

      if $scope.form.$valid
        $scope.submitting = true

        service.DSUpdate($scope.formData).then((response) ->
          $modalInstance.close(response)
          toastr.success "El estado del servicio #{response.code} ha cambiado a #{response.status.data.name} correctamente."
        , (errorResponse) ->
          toastr.error "Hubo un error al cambiar el estado del servicio #{service.code}, intentelo de nuevo más tarde."
          $scope.submitting = false
        )