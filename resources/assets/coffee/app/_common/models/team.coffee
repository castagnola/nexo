class Team extends Factory
  constructor: (DS, NEXO) ->
    adapter = DS.getAdapter('http')

    model = DS.defineResource({
      name: 'team',
      endpoint: 'teams'

      relations: {
        hasMany: {
          service: {
            foreignKey: 'team_id'
            localField: 'services'
          }
          poll: {
            foreignKey: 'team_id'
            localField: 'polls'
          }
        }
      }
    })

    model.canCreateService = (id) ->
      url = DS.utils.makePath(adapter.defaults.basePath, model.endpoint, id, 'can-create-service')
      return adapter.POST(url)


    preload = _.get NEXO, 'preload.team.data'

    unless _.isEmpty(preload)
      model.inject(preload)

    return model
