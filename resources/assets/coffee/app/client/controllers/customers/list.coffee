class CustomersList extends Controller
  constructor: ($log, $scope, Customer, DTOptionsBuilder, DTColumnDefBuilder) ->
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
      DTColumnDefBuilder.newColumnDef(0).notVisible()
      DTColumnDefBuilder.newColumnDef(7).notVisible()
      DTColumnDefBuilder.newColumnDef(9).notVisible()
    ]


    onDelete = (item) ->

      message = 'Al borrar al cliente se desvinculará de todos los otros datos que tenga. Esta acción no se puede deshacer. ¿Está seguro de que quiere eliminar al cliente?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando a un cliente', item
          item.DSDestroy().then(() ->
            toastr.success "El cliente #{item.name} ha sido eliminado correctamente"
          )
      )
      return


    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete


    Customer.bindAll({}, $scope, 'customers')
