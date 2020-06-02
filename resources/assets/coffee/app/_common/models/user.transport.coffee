class UserTransport extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'userTransport',
      endpoint: 'transports'

      relations: {
        belongsTo: {
          transport: {
            localField: 'transport'
            localKey: 'transport_id'
          }
          user: {
            parent: true
            localField: 'user'
            localKey: 'user_id'
          }
        }
      }
    })

    return model