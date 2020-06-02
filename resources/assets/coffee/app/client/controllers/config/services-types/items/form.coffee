class ConfigServicesTypesItemForm extends Controller
  constructor: ($scope, $uibModalInstance, serviceType, item, editMode, ServiceTypeItem, ServiceTypeItemForm) ->
    $scope.model = {
      service_type_id: serviceType.id
    }

    if editMode
      $scope.model = _.clone(item)

    $scope.editMode = editMode
    $scope.fields = ServiceTypeItemForm
    $scope.serviceType = serviceType

    $scope.cancel = ->
      $uibModalInstance.dismiss('cancel')

    onFinallySubmit = ->
      $scope.submitting = false

    onSuccessSubmit = (response) ->
      $uibModalInstance.close(response)
      toastr.success(if editMode then 'Herramienta editada correctamente' else 'Herramienta creada correctamente')
      serviceType.DSRefresh()

    $scope.submit = ->
      if $scope.form.$valid
        $scope.submitting = true

        if editMode
          item.DSUpdate($scope.model).then(onSuccessSubmit).finally(onFinallySubmit)
        else
          ServiceTypeItem.create($scope.model).then(onSuccessSubmit).finally(onFinallySubmit)
