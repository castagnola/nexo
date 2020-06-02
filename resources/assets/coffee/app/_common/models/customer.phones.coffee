class CustomerPhone extends Factory
  constructor: ($log, $q, $http, DS) ->
    model = DS.defineResource({
      name: 'customerPhone',
      endpoint: 'phones'

      relations: {
        belongsTo: {
          customer: {
            parent: true
            localField: 'customer',
            localKey: 'customer_id',
          }
        }
      }
    })

    return model