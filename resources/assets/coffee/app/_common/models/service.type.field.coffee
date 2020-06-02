class ServiceTypeField extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'serviceTypeField',
      endpoint: 'fields'


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