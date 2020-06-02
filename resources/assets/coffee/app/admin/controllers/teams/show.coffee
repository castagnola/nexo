class TeamsShow extends Controller
  constructor: ($log, $scope, $state, $stateParams, Team) ->
    isTeamModule = (module) ->
      modules = _.get($scope.team, 'modules.data')
      return _.some(modules, {id: module.id})


    onDelete = () ->
      message = ''

      message = 'Al borrar la empresa se desvinculará de todos los otros datos que tenga. Esta acción no se puede deshacer. ¿Está seguro de que quiere eliminar la empresa?'

      bootbox.confirm(message, (result) ->
        if result
          $log.debug 'Eliminando a una empresa', $scope.team
          $scope.team.DSDestroy().then(() ->
            toastr.success "La empresa #{$scope.team.name} ha sido eliminada correctamente"
            $state.go 'teams'
          )
      )
      return

    vm = this
    vm.isTeamModule = isTeamModule
    vm.onDelete = onDelete

    Team.bindOne($stateParams.teamId, $scope, 'team')