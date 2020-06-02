class NexoMap extends Factory
  constructor: ($q, $http, NEXO, CustomerAddress) ->
    NexoMapInstance = {

      markerIcon: (color) ->
        return "#{NEXO.base_url}images/original/markers/#{color}.png"

      updateCustomerAddressCoords: (id, coords) ->
        CustomerAddress.update(id, coords)

      getCoordsFromService: (service) ->
        deferred = $q.defer()
        latitude = service.latitude or false
        longitude = service.longitude or false


        if latitude and longitude
          deferred.resolve({
            latitude: latitude
            longitude: longitude
          })
        else
          address = "#{service.address}, #{service.city.data.name}, #{service.city.data.state.data.name}, Colombia"
          $http(
            url: "http://maps.google.com/maps/api/geocode/json"
            params:
              address: address
              sensor: false
          ).success((mapData) ->
            results = mapData.results

            if !_.isEmpty results
              result = _.first results

              coords =
                latitude: result.geometry.location.lat
                longitude: result.geometry.location.lng

              NexoMapInstance.updateCustomerAddressCoords(service.customer_address_id, coords)
              deferred.resolve(coords)
            else
              deferred.reject('NO_RESULTS')
          )


        return deferred.promise
    }

    return NexoMapInstance
