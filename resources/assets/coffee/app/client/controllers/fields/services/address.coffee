class ServiceAddressField extends Controller
  constructor: ($log, $scope, $timeout, uiGmapGoogleMapApi, Customer, CustomerAddress, NEXO, NEXO_MARKERS) ->
    options = $scope.options
    key = options.key

    selectAddress = (address) ->
      $log.debug 'Address selected', address
      $scope.model[key] = address.id
      $scope.addressSelected = address
      showMap()

    showMap = () ->
      $scope.loadingMap = true
      uiGmapGoogleMapApi.then((map) ->
        $scope.addressSelected.getCoordinates().then((coordinates) ->
          $log.debug 'Address: coordinates updated', coordinates
          # ACtualizando las coordenadas de l nuevo servicio
          latitude = coordinates.latitude
          longitude = coordinates.longitude
          street = _.get($scope.addressSelected, 'street')
          city_id = _.get($scope.addressSelected, 'city_id')

          try
            map = "https://maps.googleapis.com/maps/api/staticmap?center=#{latitude},#{longitude}&size=600x600&zoom=16&markers=color:red|#{latitude},#{longitude}&scale=2"
            _.set($scope.model, 'address', street) or null
            _.set($scope.model, 'city_id', city_id) or null
            _.set($scope.model, 'latitude', latitude) or null
            _.set($scope.model, 'longitude', longitude) or null
            _.set($scope.model, 'map', map)

          catch e
            $log.error 'Error procesando al dirección seleccionada', e


          $scope.showMap = true
          $scope.map = {
            center: coordinates
            zoom: 15
            control: {}
          }

          $scope.marker = {
            id: 0,
            coords: angular.copy(coordinates),
            options: {
              draggable: true
              icon: NEXO_MARKERS.HOME.RED
              animation: google.maps.Animation.DROP
            }
            events: {
              dragend: (marker) ->
                $log.debug 'El marker se ha movido', marker

                location =
                  latitude: marker.position.lat()
                  longitude: marker.position.lng()

                $scope.addressSelected.DSUpdate(location)

            }
          }
          $timeout ->
            unless _.isEmpty($scope.map.control)
              $scope.map.control.refresh(coordinates)
        ).finally(() ->
          $scope.loadingMap = false
        )
      )


    newAddressFields = [
      {
        key: 'city',
        type: 'cities',
        templateOptions: {
          label: 'Ciudad'
          required: true
        }
      }
      {
        key: 'street',
        type: 'textarea',
        templateOptions: {
          label: 'Dirección',
          required: true,
        }
      }
    ]

    cancelSaveNewAddress = ->
      $scope.showNewAddressForm = false

    saveNewAddress = ->
      $scope.savingNewAddress = true
      CustomerAddress.create($scope.newAddressModel)
      .then((response) ->
        $scope.showNewAddressForm = false
        $scope.newAddressModel = {
          customer_id: $scope.model.customer_id
        }
        selectAddress(response)
      ).finally(() ->
        $scope.savingNewAddress = false
      )


    $scope.selectAddress = selectAddress
    $scope.newAddressFields = newAddressFields
    $scope.newAddressModel = {
      customer_id: $scope.model.customer_id
    }
    $scope.saveNewAddress = saveNewAddress
    $scope.cancelSaveNewAddress = cancelSaveNewAddress

    # Se selecciona la primera dirección del cliente por defecto
    unWatchCustomerId = $scope.$watch 'model.customer_id', (customerId) ->
      unless _.isUndefined(customerId)
        customer = _.get($scope.model, 'customer') or Customer.get(customerId)

        unless _.isEmpty(customer)



          paramsToBindAddresses = {
            where: {
              customer_id: customer.id
            }
          }

          console.log 'customer', CustomerAddress.getAll()

          CustomerAddress.bindAll(paramsToBindAddresses, $scope, 'addresses', (cb, addresses) ->
            address = _.find(addresses, {id: $scope.model[key]}) or _.first(addresses)

            console.log 'addresses', addresses

            unless _.isEmpty(address)
              selectAddress(address)
            else
              $scope.model[key] = null
              $scope.addressSelected = null
          )

          unWatchCustomerId()



















