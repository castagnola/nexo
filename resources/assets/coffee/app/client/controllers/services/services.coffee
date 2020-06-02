class Services extends Controller
  constructor: ($log, $scope, $modal, $state, $filter, Customer, User, Service, ServiceStatus, ServiceType, NEXO, DTOptionsBuilder, DTColumnDefBuilder) ->
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
      DTColumnDefBuilder.newColumnDef(4).notVisible()
      DTColumnDefBuilder.newColumnDef(8).notVisible()
      DTColumnDefBuilder.newColumnDef(9).notVisible()
      DTColumnDefBuilder.newColumnDef(11).notVisible()
    ]

    onDelete = (item) ->
      message = 'Esta acción no se puede deshacer. ¿Está seguro de que quiere eliminar el servicio?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando a un servicio', item
          item.DSDestroy().then(() ->
            toastr.success "El servicio #{item.name} ha sido eliminado correctamente"
          )
      )
      return


    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete


    Service.bindAll({}, $scope, 'items')


