class ConfigServicesTypesEditForm extends Controller
  constructor: ($log, $scope, $stateParams, ServiceType, ServiceTypeField, $uibModal) ->
    paramsToBind = {
      where: {
        service_type_id: $stateParams.serviceTypeId
      }
    }

    onCreateField = ->
      modalInstance = $uibModal.open({
        animation: true
        templateUrl: templateUrl('config/services-types/fields/form')
        controller: 'configServicesTypesFieldFormController'
        resolve: {
          serviceType: ->
            return $scope.item
          item: false
          editMode: false
        }
      })

    onEditField = (field)->
      modalInstance = $uibModal.open({
        animation: true
        templateUrl: templateUrl('config/services-types/fields/form')
        controller: 'configServicesTypesFieldFormController'
        resolve: {
          serviceType: ->
            return $scope.item
          item: ->
            return field
          editMode: true
        }
      })


    onDeleteField = (field) ->
      bootbox.confirm('¿Está seguro de que quiere eliminar la especificación?', (result) ->
        if result
          $log.debug 'Eliminando un campo', field
          field.DSDestroy().then(() ->
            toastr.success('Especificación eliminado correctamente')
            $scope.item.DSRefresh()
          )
      )
      return

    vm = this
    vm.onCreateField = onCreateField
    vm.onEditField = onEditField
    vm.onDeleteField = onDeleteField


    ServiceType.bindOne($stateParams.serviceTypeId, $scope, 'item')
    ServiceTypeField.bindAll(paramsToBind, $scope, 'fields')
