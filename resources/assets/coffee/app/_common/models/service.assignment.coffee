class ServiceAssignment extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'serviceAssignment',
      endpoint: 'assignments'

      relations: {
        belongsTo: {
          service: {
            localField: 'service',
            localKey: 'service_id',
          }
          user: {
            localField: 'user',
            localKey: 'user_id',
          }
        }
      }
    })

    return model