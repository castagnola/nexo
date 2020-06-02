class UserGeolocalization extends Factory
  constructor: (DS) ->
    model = DS.defineResource({
      name: 'userGeolocalization',
      endpoint: 'geolocalizations'

      relations: {
        belongsTo: {
          user: {
            parent: true
            localField: 'user'
            localKey: 'user_id'
          }
        }
      }
    })

    return model