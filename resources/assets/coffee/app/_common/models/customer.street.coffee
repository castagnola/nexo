class CustomerAddress extends Factory
  constructor: ($log, $q, $http, DS, IS) ->
    model = DS.defineResource({
      name: 'customerAddress',
      endpoint: 'addresses'

      relations: {
        belongsTo: {
          customer: {
            parent: true
            localField: 'customer',
            localKey: 'customer_id',
          }
        }
      }

      methods: {
        getCoordinates: ->
          return model.getCoordinates(this)
      }
    })

    model.getCoordinates = (address) ->
      deferred = $q.defer()
      coordinatesCheck = [address.latitude, address.longitude]
      check = !IS.all.empty(coordinatesCheck) and !IS.all.null(coordinatesCheck) and !IS.all.undefined(coordinatesCheck)

      if check
        deferred.resolve(_.pick(address, 'latitude', 'longitude'))
      else
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': address.address}, (results, status) ->
          $log.debug 'Las coordenadas se desconocen, se buscaron en el servicio', results, status

          if status is google.maps.GeocoderStatus.OK
            location = results[0].geometry.location

            result = {
              latitude: location.lat()
              longitude: location.lng()
            }

            address.latitude = result.latitude
            address.longitude = result.longitude

            address.DSUpdate(result)

            deferred.resolve(result)
          else
            deferred.resolve(
              latitude: address.city.latitude
              longitude: address.city.longitude
            )
        )

      return deferred.promise

    return model