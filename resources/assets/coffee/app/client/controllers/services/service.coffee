class Service extends Controller
  constructor: ($scope, $window, Service) ->
    self = @

    @getService = (id) ->
      self.loadingService = true

      Service.find(id, {
        params: {
          include : 'users,assignments.user'
        }
      }).then((response) ->
        self.service = response
        self.loadingService = true
      )


    @getService($window.NEXO.serviceCode)

