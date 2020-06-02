class ServicesAssignmentsFormField extends Controller
  constructor: ($log, $scope, NexoEvent, NexoSocket, User, $uibModal, uiGmapGoogleMapApi) ->
    options = $scope.options
    key = 'assignments'

    eventsInInterval = []
    $scope.usersSelected = []


    processUsers = (users) ->
      ids = _.pluck(users, 'id')
      start = $scope.model.start_at
      end = $scope.model.end_at
      excludeServicesIds = [$scope.model.id] unless _.isEmpty($scope.model.id)


      User.getBusy(ids, start, end, excludeServicesIds).then((response) ->
        usersBusy = response.data

        _.forEach(users, (user) ->
          showDistance = $scope.model.date_type isnt 'schedule'
          user.showDistance = showDistance
          user.busy = _.some(usersBusy, (usersBusyId) ->
            return user.id is usersBusyId
          )

          if showDistance
            dataToCalculateDistance = {
              from: {
                latitude: $scope.model.latitude
                longitude: $scope.model.longitude
              }

              to: {}
            }

            geolocalization = _.first(_.get(user, 'geolocalizations'))

            unless _.isEmpty(geolocalization)
              dataToCalculateDistance.to.latitude = geolocalization.latitude
              dataToCalculateDistance.to.longitude = geolocalization.longitude

            uiGmapGoogleMapApi.then(() ->
              user.distance = if !_.isEmpty(dataToCalculateDistance.to) then _.distanceFromCoordinates(dataToCalculateDistance) else null
            )
        )
      )

      return users

    getUsersAvailable = ->
      paramsToBindUsers =
        where:
          can_schedule: true
          id:
            'notIn': _.pluck($scope.usersSelected, 'id')

      users = User.filter(paramsToBindUsers)
      return processUsers(users)

    getEventsInInterval = ->
      startAt = moment($scope.model.start_at).unix()
      endAt = moment($scope.model.end_at).unix()

      events = _.filter(NexoEvent.getAll(), (event) ->
        return (event.start_unix >= startAt and event.start_unix <= endAt) or (startAt >= event.start_unix and startAt <= event.end_unix)
      )

      return events


    onResizeLists = ->
      $scope.$broadcast 'vsRepeatResize'

    onSelectUser = (user) ->
      $scope.usersSelected.push user
      _.remove(vm.usersList, {id: user.id})
      onResizeLists()


    onDeselectUser = (user) ->
      vm.usersList.push user
      _.remove($scope.usersSelected, {id: user.id})
      onResizeLists()


    onSelectAllFreeUsers = ->
      users = _.where(vm.usersList, {busy: false})
      _.forEach(users, (user) ->
        onSelectUser(user)
      )

      $log.debug 'Seleccionando a todos los usuarios libres'


    onSelectAllUsers = ->
      $log.debug 'Seleccionando a todos los usuarios'
      $scope.usersSelected = vm.usersList
      vm.usersList = []


    onDeselectAllUsers = ->
      $log.debug 'Deseleccionando a todos los usuarios'
      $scope.usersSelected = []
      vm.usersList = getUsersAvailable()


    onDeselectAllBusyUsers = ->
      users = _.where($scope.usersSelected, {busy: true})
      _.forEach(users, (user) ->
        onDeselectUser(user)
      )

      $log.debug 'Deseleccionando a todos los usuarios ocupados'


    vm = this
    vm.onSelectUser = onSelectUser
    vm.onDeselectUser = onDeselectUser
    vm.onSelectAllFreeUsers = onSelectAllFreeUsers
    vm.onSelectAllUsers = onSelectAllUsers
    vm.onDeselectAllUsers = onDeselectAllUsers
    vm.onDeselectAllBusyUsers = onDeselectAllBusyUsers
    vm.onResizeLists = onResizeLists
    vm.usersList = $scope.usersList or []
    vm.userPopoverTemplate = templateUrl('fields/services/assignments-form-popover')

    vm.openUserCalendar = (user) ->
      user.popoverIsOpen = false
      modalInstance = $uibModal.open({
        templateUrl: templateUrl('calendar/modals/user'),
        controller: 'userCalendarController',
        size: 'lg'
        resolve: {
          user: ->
            return user
        }
      })


    vm.add =
      targetOn: false
      targetEntered: false
      dragEvents:
        onStart: ->
          $log.debug 'add drag start'

          $scope.$apply ->
            vm.add.targetOn = true

            onResizeLists()

        onLeave: (event) ->
          type = event.draggable.currentTarget.data('type')
          $log.debug 'add drag leave', event, type

          if type is 'add'
            $scope.$apply ->
              vm.add.targetEntered = false

        onEnter: (event) ->
          type = event.draggable.currentTarget.data('type')
          $log.debug 'add drag enter', event, type

          if type is 'add'
            $scope.$apply ->
              vm.add.targetEntered = true

        onEnd: (event) ->
          $log.debug 'add drag end', event
          event.currentTarget.removeClass('nexo-users-list-item-drag')

          $scope.$apply ->
            vm.add.targetEntered = false
            vm.add.targetOn = false

        onDrop: (event) ->
          currentTarget = event.draggable.currentTarget

          type = currentTarget.data('type')
          $log.debug 'add on drop', event,

            if type is 'add'
              userId = currentTarget.data('userId')
              user = User.get(userId)
              onSelectUser(user)


    vm.remove =
      targetOn: false
      targetEntered: false
      dragEvents:
        onStart: () ->
          $scope.$apply ->
            vm.remove.targetOn = true

            onResizeLists()

        onLeave: (event) ->
          type = event.draggable.currentTarget.data('type')
          $log.debug 'remove drag leave', event, type

          if type is 'remove'
            $scope.$apply ->
              vm.remove.targetEntered = false

        onEnter: (event) ->
          type = event.draggable.currentTarget.data('type')
          $log.debug 'remove drag enter', event, type

          if type is 'remove'
            $scope.$apply ->
              vm.remove.targetEntered = true

        onEnd: (event) ->
          $log.debug 'remove drag end', event
          event.currentTarget.removeClass('nexo-users-list-item-drag')

          $scope.$apply ->
            vm.remove.targetEntered = false
            vm.remove.targetOn = false

        onDrop: (event) ->
          currentTarget = event.draggable.currentTarget

          type = currentTarget.data('type')
          $log.debug 'remove on drop', event,

            if type is 'remove'
              userId = currentTarget.data('userId')
              user = User.get(userId)
              onDeselectUser(user)


    vm.draggableHint = (element) ->
      element.addClass('nexo-users-list-item-drag')

      wrap = angular.element('<div class="nexo-users-list-item nexo-users-list-item-dragging" />')
      media = element.find('.media').clone()

      return wrap.append(media)


    $scope.$watchGroup ['model.start_at', 'model.end_at', 'model.assignment_type', 'model.latitude', 'model.longitude'], ->
      onResizeLists() if !_.isEmpty(vm.usersList)

      eventsInInterval = getEventsInInterval()
      vm.usersList = getUsersAvailable()

      unless _.isEmpty $scope.usersSelected
        $scope.usersSelected = processUsers($scope.usersSelected)
        onResizeLists()

      $log.debug 'Lista de usuarios actualizada'


    firstTime = true

    $scope.$watch 'model.assignment_type', (nv) ->
      if nv is 'mandatory'
        key = 'users'
      else
        key = 'assignments'

      if firstTime
        _.forEach(_.get($scope.model, "#{key}"), (user) ->
          userModel = User.get(user.id)
          onSelectUser(userModel)
        )

        firstTime = false

      $scope.model[key] = $scope.usersSelected


    $scope.$watchCollection 'usersSelected', (nv) ->
      $scope.model[key] = nv
      console.log 'watch usersSelected', nv
















