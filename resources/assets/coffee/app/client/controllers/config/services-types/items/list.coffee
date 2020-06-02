class ConfigServicesTypesEditItems extends Controller
  constructor: ($log, $scope, $stateParams, ServiceType, ServiceTypeItem, $uibModal) ->
    paramsToBind = {
      where: {
        service_type_id: $stateParams.serviceTypeId
      }
    }

    onCreate = ->
      modalInstance = $uibModal.open({
        animation: true
        templateUrl: templateUrl('config/services-types/items/form')
        controller: 'configServicesTypesItemFormController'
        resolve: {
          serviceType: ->
            return $scope.item
          item: false
          editMode: false
        }
      })

    onEdit = (field)->
      modalInstance = $uibModal.open({
        animation: true
        templateUrl: templateUrl('config/services-types/fields/form')
        controller: 'configServicesTypesItemFormController'
        resolve: {
          serviceType: ->
            return $scope.item
          item: ->
            return field
          editMode: true
        }
      })


    onDelete = (field) ->
      bootbox.confirm('¿Está seguro de que quiere eliminar la herramienta?', (result) ->
        if result
          $log.debug 'Eliminando un item', field
          field.DSDestroy().then(() ->
            toastr.success('Herramienta eliminada correctamente')
            $scope.item.DSRefresh()
          )
      )
      return

    vm = this
    vm.onCreate = onCreate
    vm.onEdit = onEdit
    vm.onDelete = onDelete


    ServiceType.bindOne($stateParams.serviceTypeId, $scope, 'item')
    ServiceTypeItem.bindAll(paramsToBind, $scope, 'items')
