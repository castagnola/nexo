class Poll extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'poll',
      endpoint: 'polls'

      relations: {
        belongsTo: {
          team: {
            localField: 'team',
            localKey: 'team_id'
          }
        }
      }
    })




    return model
