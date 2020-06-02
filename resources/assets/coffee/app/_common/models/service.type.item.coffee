class ServiceTypeItem extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'serviceTypeItem',
      endpoint: 'items'

      relations: {
        belongsTo: {
          serviceType: {
            parent: true
            localField: 'service_type',
            localKey: 'service_type_id'
          }
        }
      }
    })

    return model