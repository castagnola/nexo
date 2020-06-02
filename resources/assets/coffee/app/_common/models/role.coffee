class Role extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'role',
      endpoint: 'roles'
    })

    return model