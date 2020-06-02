class ConfigServicesTypesList extends Controller
  constructor: ($log, $scope, ServiceType, DTOptionsBuilder, DTColumnDefBuilder) ->

    onDelete = (category) ->
      bootbox.confirm('¿Está seguro de que quiere eliminar la categoría?', (result) ->
        if result
          $log.debug 'Eliminando una categoría', category
          category.DSDestroy().then(() ->
            toastr.success "La categoría #{category.name} ha sido eliminada correctamente"
          )
      )
      return


    options = DTOptionsBuilder.newOptions()
    .withBootstrap()
    .withPaginationType('full_numbers')
    .withButtons([
        {
          extend: 'colvis',
          text: 'Columnas'
        }
      ])


    columns = [
# DTColumnDefBuilder.newColumnDef(0).notVisible()
    ]


    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete


    ServiceType.bindAll({}, $scope, 'items')
