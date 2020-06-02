class ServiceType extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'serviceType',
      endpoint: 'services-types'


      relations: {
        hasMany: {
          serviceTypeItem: {
            localField: 'items',
            foreignKey: 'service_type_id'
          }

          serviceTypeField: {
            localField: 'fields',
            foreignKey: 'service_type_id'
          }
        }
      }
    })


    return model