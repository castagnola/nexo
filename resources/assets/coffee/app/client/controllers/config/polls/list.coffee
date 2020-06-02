class ConfigPollsList extends Controller
  constructor: ($log, $scope, Poll, DTOptionsBuilder) ->
    options = DTOptionsBuilder
    .newOptions()
    .withBootstrap()
    .withPaginationType('full_numbers')

    columns = []

    onDelete = (item) ->
      message = ''

      if item.is_active
        message = 'Esta encuesta está activa si la elimina sus clientes dejarán de verla. <br><br>'


      message += '¿Está seguro de que quiere eliminar la encuesta?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando una encuesta', item
          item.DSDestroy().then(() ->
            toastr.success "La encuesta #{item.name} ha sido eliminada correctamente"
          )
      )
      return

    onActive = (itemSelected) ->
      itemSelected.DSUpdate({
        is_active: 1
      }).then(() ->
        toastr.success "La encuesta #{itemSelected.name} ha sido activada correctamente."
      )

      _.forEach($scope.items, (item) ->
        if item.id isnt itemSelected.id
          item.DSUpdate({
            is_active: 0
          })
      )

    onDesactive = (item) ->
      item.DSUpdate({
        is_active: 0
      }).then(() ->
        toastr.success "La encuesta #{item.name} ha sido desactivada correctamente."
      )


    vm = this
    vm.dtOptions = options
    vm.dtColumns = columns
    vm.dtInstance = {}
    vm.onDelete = onDelete
    vm.onActive = onActive
    vm.onDesactive = onDesactive


    Poll.bindAll({}, $scope, 'items', (cb, data) ->
      vm.showDontHaveActivePolls = !_.some(data, {is_active: true})
    )

