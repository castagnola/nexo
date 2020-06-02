class NexoEvent extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'event',
      endpoint: 'events'

      relations: {
        belongsTo: {
          user: {
            localField: 'user',
            localKey: 'user_id',
          }
        }
      }
    })

    return model