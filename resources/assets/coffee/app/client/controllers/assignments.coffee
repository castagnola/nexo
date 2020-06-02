class Assignments extends Controller
  constructor: ($scope, $log, Service, User, TEMPLATE_URL, DATES_FORMATS) ->
    self = @
    @currentService = false
    @markers = []
    @markersEvents =
      click: (marker, eventName, model) ->
        self.selectedModel = model
        self.windowCoords =
          latitude: model.latitude
          longitude: model.longitude
        self.windowParameter.model = model

    @map = {
      center: {}
      zoom: 15
    }

    @windowTemplateUrl = "#{TEMPLATE_URL}team.assignments.info-window"

    @getServices = ->
      self.loadingServices = true
      Service.findAll({
        status: 'available-to-assign'
        include: 'assignments.user'
      }).then((response) ->
        self.loadingServices = false
        self.services = response

        self.getUsers()
      , () ->
        self.loadingServices = true
      )

    @getServices()

    @getUsers = ->
      self.loadingUsers = true
      User.findAll({
        role: 'rutero'
        include: 'geolocalizations:limit(1):order(created_at|desc)'
      }).then((response) ->
        self.users = response
      )

    @refreshUser = (model) ->
      model.showWindow = true
      model.refreshingUser = true

      User.refresh(model.id, {
        params: {
          include: 'geolocalizations:limit(1):order(created_at|desc)'
        }
      }).then(() ->
        model.refreshingUser = false
      )

    @assignUser = (model) ->
      model.showWindow = false
      model.icon.url = markerIcon 'blue'
      model.assigned = true

      user = angular.copy User.get(model.id)

      assignment =
        id: _.uniqueId('temp-assign')
        user_id: user.id
        is_temp: true
        unsaved: true
        start_at:
          date: self.currentService.start_at.date
        end_at:
          date: self.currentService.end_at.date
        user:
          data: user

      self.currentService.assignments.data.push assignment
      self.currentService.hasChanges = true

    @removeAssignment = (assignment) ->
      marker = _.find(self.markers, {id: assignment.user_id})

      if !_.isEmpty marker
        marker.assigned = false
        marker.icon.url = markerIcon 'green
'
      _.remove self.currentService.assignments.data, {id: assignment.id}
      self.currentService.hasChanges = true

    $scope.$watch(() ->
      return self.currentService
    , (newCurrentService, oldCurrentService) ->
      unless _.isUndefined newCurrentService
        _.forEach(_.where(self.markers, {is_user: true}), (marker) ->
          assigned = _.some(newCurrentService.assignments.data, {user_id: marker.id})
          marker.showWindow = false
          marker.assigned = assigned
          marker.icon.url = markerIcon(if assigned then 'blue' else 'green')
        ) unless _.isEqual newCurrentService, oldCurrentService
    )


    User.bindAll({}, $scope, 'users', (cb, users) ->
      _.forEach(users, (user) ->
        unless _.isEmpty user.geolocalizations.data
          geo = _.first(user.geolocalizations.data)

          # Existe un marker?
          currentMarker = _.find(self.markers, {id: user.id})

          if !_.isEmpty(currentMarker)
            currentMarker.latitude = geo.latitude
            currentMarker.longitude = geo.longitude
            currentMarker.date = geo.created_at.date
          else
            marker =
              id: user.id
              latitude: geo.latitude
              longitude: geo.longitude
              icon:
                url: markerIcon 'green'
              name: user.name
              date: geo.created_at.date
              is_user: true
              templateUrl: self.windowTemplateUrl
              refreshUser: self.refreshUser
              assignUser: self.assignUser

            self.markers.push marker
      )
    )

    markerIcon = (color) ->
      return "#{NEXO.base_url}images/original/markers/male-#{color}.png"

    @selectService = (service) ->
      self.currentService = service

      self.map.center =
        latitude: service.latitude
        longitude: service.longitude

      _.remove(self.markers, {id: 'address'})

      self.markers.push
        id: 'address',
        latitude: service.latitude
        longitude: service.longitude
        is_user: false

    @onMarkerClicked = (marker) ->
      markerToClose = marker
      m.showWindow = true
      $scope.$apply()

    @closeClick = (marker) ->
      console.log marker

    @saveCurrentServiceChanges = () ->
      self.currentService.saving = true
      self.currentService.DSUpdate({
        assignments: _.map(angular.copy(self.currentService.assignments.data), (assignment) ->
          assignment.id = null if assignment.is_temp

          return {
          id: assignment.id
          user_id: assignment.user_id
          start_at: moment(assignment.start_at.date).format(DATES_FORMATS.DATETIME)
          end_at: moment(assignment.end_at.date).format(DATES_FORMATS.DATETIME)
          }
        )
      }).then(() ->
        self.currentService.assignments_count = self.currentService.assignments.data.length
        self.currentService.saving = false
        self.currentService.hasChanges = false

        toastr.success('Las asignaciones del servicio fueron actualizadas correctamente',
          "Servicio #{self.currentService.code} actualizado")
      , () ->
        self.currentService.saving = false
        toastr.error('Hubo un error guardando el servicio.',
          "Error guardando")
      )



