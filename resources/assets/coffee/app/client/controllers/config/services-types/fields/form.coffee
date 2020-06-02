class ConfigServicesTypesFieldForm extends Controller
  constructor: ($scope, $uibModalInstance, serviceType, item, editMode, ServiceTypeField, ServiceTypeFieldForm) ->
    $scope.model = {
      service_type_id: serviceType.id
    }

    if editMode
      $scope.model = _.clone(item)

    $scope.editMode = editMode
    $scope.fields = ServiceTypeFieldForm
    $scope.serviceType = serviceType

    $scope.cancel = ->
      $uibModalInstance.dismiss('cancel')

    onFinallySubmit = ->
      $scope.submitting = false

    onSuccessSubmit = (response) ->
      $uibModalInstance.close(response)
      toastr.success(if editMode then 'Especifiación editada correctamente' else 'Especifiación creada correctamente')
      serviceType.DSRefresh()

    $scope.submit = ->
      if $scope.form.$valid
        $scope.submitting = true

        if editMode
          item.DSUpdate($scope.model).then(onSuccessSubmit).finally(onFinallySubmit)
        else
          ServiceTypeField.create($scope.model).then(onSuccessSubmit).finally(onFinallySubmit)
