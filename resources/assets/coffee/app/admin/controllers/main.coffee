class Main extends Controller
  constructor: ($rootScope, Module) ->
    Module.findAll()
    Module.bindAll({}, $rootScope, '$nexoModules')