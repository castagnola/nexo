class Customer extends Controller
  constructor: ($rootScope, $scope, Customer, API_URL, $http) ->
    $scope.customerFormData = {}

    $scope.cities = []

    $scope.phoneTypes = [
      {
        name: 'Teléfono fijo'
        slug: 'telefono-fijo',
        icon: 'fa fa-phone'
      }
      {
        name: 'Teléfono móvil'
        slug: 'telefono-movil',
        icon: 'fa fa-mobile'
      }
    ]

    $scope.addresses = [
      {
        id: parseInt(_.uniqueId())
        city: null,
        street: null,
        is_primary: true
      }
    ]

    $scope.phones = [
      {
        id: _.uniqueId('contact-data-'),
        type: _.first $scope.phoneTypes
        value: null
      }
    ]

    $scope.addAddress = () ->
      $scope.addresses.push({
        id: parseInt(_.uniqueId())
        city: null,
        street: null,
        is_primary: false
      })

    $scope.removeAddress = (street) ->
      _.remove($scope.addresses, {id: street.id})


    $scope.addPhone = ->
      $scope.phones.push
        id: _.uniqueId('contact-data-'),
        type: _.first $scope.phoneTypes
        value: null


    $scope.removePhone = (phone) ->
      _.remove $scope.phones, {id: phone.id}


    $scope.submitCustomerForm = () ->
      $scope.$broadcast('show-errors-check-validity')

      if $scope.customerForm.$valid
        $scope.customerFormSaving = true
        data = angular.copy $scope.customerFormData

        data.addresses = _.map($scope.addresses, (address) ->
            address.city_id = address.city.id
            delete address.city
            return address
        )

        data.phones = _.map($scope.phones, (phone) ->
            phone.type = phone.type.slug
            return phone
        )

        Customer.create(data).then((response) ->
          $rootScope.$broadcast('customer-created', response)
        )


    $scope.searchCities = ($query) ->
      return false if _.isEmpty $query

      $http({
        url: "#{API_URL}cities"
        cache: true
        params: {
          search: $query
          orderBy: 'name',
          sortedBy: 'asc'
        }
      }).then((response) ->
        $scope.cities = response.data.data
      );
