class Transport extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'transport',
      endpoint: 'transports'

      relations: {
        hasMany: {
          userTransport: {
            localField: 'users',
            foreignKey: 'transport_id'
          }
        }
      }
    })

    return model