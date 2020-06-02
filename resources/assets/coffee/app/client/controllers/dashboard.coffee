class Dashboard extends Controller
  constructor: ($rootScope, $scope, Module, Service, Team, NEXO) ->
    isTeamModule = (module) ->
      teamModules = _.get $scope, 'team.modules.data'
      return _.some teamModules, {id: module.id}

    vm = this
    vm.isTeamModule = isTeamModule

    Team.bindOne NEXO.team_id, $scope, 'team'

    Service.bindAll({
      where: {
        team_id: NEXO.team_id
      }
      orderBy: [
        ['created_at.date', 'DESC']
      ]
      limit: 5
    }, $scope, 'services')



