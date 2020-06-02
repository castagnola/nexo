class UsersList extends Controller
  constructor: ($log, $scope, $modal, $filter, $state, User, NEXO, DTOptionsBuilder, DTColumnDefBuilder) ->
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
      DTColumnDefBuilder.newColumnDef(1).notSortable()
      DTColumnDefBuilder.newColumnDef(8).notVisible()
      DTColumnDefBuilder.newColumnDef(9).notSortable()
    ]


    onDelete = (item) ->
      message = ''

      message = 'Al borrar al usuario se desvinculará de todos los otros datos que tenga. Esta acción no se puede deshacer. ¿Está seguro de que quiere eliminar al usuario?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando a un usuario', item
          item.DSDestroy().then(() ->
            toastr.success "El usuario #{item.name} ha sido eliminado correctamente"
          )
      )
      return

    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete


    User.bindAll({}, $scope, 'users')
