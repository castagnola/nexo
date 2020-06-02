class Module extends Factory
  constructor: (DS) ->
    return DS.defineResource({
      name: 'module',
      endpoint: 'modules'
    })