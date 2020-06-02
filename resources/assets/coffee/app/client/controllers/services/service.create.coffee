class ServiceCreate extends Controller
  constructor: ($rootScope, $scope, $log, $http, $timeout, $modal, NEXO, DATES_FORMATS, User, Customer, CustomerAddress, Service) ->
    $scope.CREATION_DATA = NEXO.creationData
    $scope.servicesItems = []
    $scope.serviceFormData = {
      date: moment().minutes(0).seconds(0).add(1, 'h')
      users: []
    }
    $scope.currentStep = 'creation'

    $scope.showCustomerForm = false
    $scope.showCustomerInfo = false
    $scope.currentCustomer = null
    $scope.minDate = new Date()


    $rootScope.usersPreassigned = []


    ###
       =============================
       === REFERENTE A LOS MAPAS ===
       =============================
    ###

    selectedAddress = (newAddress) ->
      console.log newAddress
      if !_.isUndefined(newAddress) and !_.isEmpty(newAddress)
        $rootScope.$broadcast 'map:set-service', {
          id: _.uniqueId('temp-service')
          latitude: newAddress.latitude,
          longitude: newAddress.longitude
          city: newAddress.city
          address: newAddress.street
          customer_address_id: newAddress.id
        }

    $scope.$watchCollection('serviceFormData.address', selectedAddress)

    $rootScope.$on 'create-service:update-geolocation', (e, coords) ->
      $scope.serviceFormData.address.latitude = coords.latitude
      $scope.serviceFormData.address.longitude = coords.longitude

      $log.info 'Dirección actualizada', coords


    ###
       ================================
       === REFERENTE A LOS CLIENTES ===
       ================================
    ###

    $scope.searchCustomers = (keywords) ->
      $scope.searchingCustomers = true
      $scope.searchedCustomers = false

      Customer.findAll({
        search: keywords
      }).then((response) ->
        $scope.searchingCustomers = false
        $scope.searchedCustomers = true
        $scope.customers = response
      , () ->
        $scope.searchingCustomers = false
        $scope.searchedCustomers = true
      )

    $scope.showCustomerFormToggle = () ->
      $scope.showCustomerForm = !$scope.showCustomerForm

    $scope.selectCustomer = (customer) ->
      $scope.currentCustomer = customer
      $scope.showCustomerInfo = true
      $scope.showCustomerForm = false

      # Preselección de la dirección
      $scope.serviceFormData.address = _.first(customer.addresses.data) unless _.isEmpty customer.addresses.data


    $scope.selectAnotherCustomer = ->
      $scope.currentCustomer = false
      $scope.showMap = false
      $scope.showCustomerInfo = false
      $scope.serviceFormData.address = null


    $scope.$on 'customer-created', (event, data) ->
      $scope.selectCustomer(data)


    ###
       ================================
       === CREACIÓN DE SERVICIO ===
       ================================
    ###

    $scope.openSelectDateModal = ->
      modalInstance = $modal.open({
        templateUrl: 'select-date-modal.html'
        controller: 'selectDateController'
        resolve: {
          date: () ->
            return $scope.serviceFormData.date
          creationData: ->
            return $scope.CREATION_DATA
        }
      })

      modalInstance.result.then((newDate) ->
        $scope.serviceFormData.date = newDate
      )

    # Seleccionar el tipo de servicio (fecha)
    $scope.selectServiceType = (type) ->
      return false if _.isUndefined $scope.serviceFormData.service_type

      $scope.serviceFormData.type = type

      if type is 'inmediate'
        $scope.serviceFormData.date = moment()


      if type is 'schedule'
        $scope.openSelectDateModal()


    # Observamos la fecha para preasignar
    $scope.$watchCollection('serviceFormData.date', (newDate, oldDate) ->
      if !_.isEqual(newDate, oldDate) and !_.isUndefined($scope.serviceFormData.service_type)
        duration = moment.duration($scope.serviceFormData.service_type.avg_response_time).asMinutes()
        # Actualizando la fecha de finalización
        $scope.serviceFormData.end = $scope.serviceFormData.date.clone().add(duration, 'minutes')

        $rootScope.$broadcast 'timeline:preassign-all-users', {
          start: newDate.toDate(),
          end: newDate.clone().add(duration, 'minutes').toDate()
        }
    )


    $scope.submitService = () ->

# Obteniendo los items seleccionados del tipo de servicio
      unless _.isEmpty($scope.serviceFormData.service_type)

        $scope.serviceFormData.items = _.filter($scope.serviceFormData.service_type.items, {selected: true})

      $timeout ->
        $scope.$broadcast('show-errors-check-validity')

        if $scope.serviceForm.$valid

# Generando el mapa estático de la ubicación del servicio
          address = $scope.serviceFormData.address
          $scope.staticMap = "https://maps.googleapis.com/maps/api/staticmap?center=#{address.latitude},#{address.longitude}&size=600x600&zoom=16&markers=color:red|#{address.latitude},#{address.longitude}"

          # Buscando los ruteros seleccionados
          $scope.currentStep = 'confirmation'


    $scope.cancelConfirmation = () ->
      $scope.currentStep = 'creation'

    $scope.confirmateSubmit = () ->
      startAtDate = moment($scope.serviceFormData.date)
      startAtDate.seconds(0)
      endAt = startAtDate.clone().add(moment.duration($scope.serviceFormData.service_type.avg_response_time).asMinutes(), 'minutes')

      data = {
        customer_id: $scope.currentCustomer.id
        service_type_id: $scope.serviceFormData.service_type.id
        address: $scope.serviceFormData.address.street
        customer_address_id: $scope.serviceFormData.address.id
        city_id: $scope.serviceFormData.address.city.data.id
        latitude: $scope.serviceFormData.address.latitude
        longitude: $scope.serviceFormData.address.longitude
        observations: $scope.serviceFormData.observations
        items: _.pluck($scope.serviceFormData.items, 'id')
        assignments: $rootScope.usersPreassigned
        start_at: startAtDate.format(DATES_FORMATS.DATETIME)
        end_at: endAt.format(DATES_FORMATS.DATETIME)
        map: $scope.staticMap
        date_type: $scope.serviceFormData.type
      }

      $scope.currentStep = 'finish'
      $scope.savingService = true
      $scope.serviceError = false
      $scope.serviceErrorValidation = false

      Service.create(data).then((response) ->
        $scope.savingService = false
        $scope.serviceCreated = true
        $scope.newService = response
      , (errorResponse) ->
        $scope.savingService = false
        $scope.serviceError = errorResponse.data
        $scope.serviceErrorValidation = errorResponse.status is 422
      )


    $scope.retryConfirmateSubmit = ->
      return $scope.confirmateSubmit() if $scope.serviceErrorValidation is false
      $scope.currentStep = 'creation'



