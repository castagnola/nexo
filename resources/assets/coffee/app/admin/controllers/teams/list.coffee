class TeamsList extends Controller
  constructor: ($log, $scope, $uibModal, $state, Team, NEXO, DTOptionsBuilder, DTColumnDefBuilder) ->
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
#DTColumnDefBuilder.newColumnDef(0).notVisible()
#DTColumnDefBuilder.newColumnDef(1).notSortable()
    ]


    onDelete = (item) ->
      message = ''

      message = 'Al borrar la empresa se desvinculará de todos los otros datos que tenga. Esta acción no se puede deshacer. ¿Está seguro de que quiere eliminar la empresa?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando a una empresa', item
          item.DSDestroy().then(() ->
            toastr.success "La empresa #{item.name} ha sido eliminada correctamente"
          )
      )
      return

    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete


    Team.bindAll({}, $scope, 'items')
