class Main extends Controller
  constructor: ($rootScope, Module, Team, NEXO, NexoSocket) ->
    Module.findAll()
    Module.bindAll({}, $rootScope, '$nexoModules')

    Team.bindOne NEXO.team_id, $rootScope, '$team'


    $rootScope.$hasModule = (moduleName) ->
      modules = _.get($rootScope, '$team.modules.data')
      return _.some(modules, (module) ->
        return module.slug is moduleName
      )



