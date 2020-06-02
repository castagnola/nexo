class Timeline extends Factory
  constructor: ($rootScope, $q, User, Service, ServiceAssignment) ->
    defaultDateFormat = 'YYYY-MM-DD HH:mm:ss'
    defaultFormatCell = 'YYYY-MM-DD-H-m'

    _duration = 0
    _stepDuration = 0

    serviceDefaultData = {
      user_id: null
      start: null
      start_data: null
      end: null
      end_data: null
      duration: 0
      extra_class: null
      is_preassign: true
      can_delete: false
      end_unix: false
      start_unix: false
    }

    createDateDataFromMoment = (date) ->
      _return =
        year: date.year()
        month: date.format('M')
        momentMonth: date.month()
        day: date.format('DD')
        hour: date.format('H')
        minutes: date.format('m')
      return _return


    getNextCellsFromStart = (start) ->
      times = _duration / _stepDuration
      startDateClone = start.clone()
      _return = []
      _.times(times, () ->
        _return.push(startDateClone.format(defaultFormatCell))
        startDateClone.add(_stepDuration, 'minutes')
      )
      return _return


    return class TimelineInstance
      constructor: () ->
        @usersConsulted = false


      @formatCell = defaultFormatCell
      @bussyCells = {}
      @services = []
      @users = []
      @assignUsers = []

      @setDuration = (duration) ->
        _duration = duration
        @duration = duration

      @setStepDuration = (stepDuration) ->
        _stepDuration = stepDuration
        @stepDuration = stepDuration

      @getUsers = ->
        deferred = $q.defer()
        self = @

        if true is self.usersConsulted
          deferred.resolve(self.users)
        else

          # Obteniendo usuarios y pintando grilla
          User.findAll({
            role: ['rutero']
            include: 'geolocalizations:limit(1):order(created_at|desc),assignments.service,services'
          }).then((users) ->
            self.users = users
            self.usersConsulted = true


            servicesToAdd = []

            # Iterando los usuarios para indicar cuales son los servicios
            _.forEach(users, (user) ->

              self.bussyCells[user.id] = [] unless _.has self.bussyCells, user.id

              unless _.isEmpty user.assignments.data
                _.forEach user.assignments.data, (assignment) ->
                  service = assignment.service.data
                  service.user_id = user.id
                  servicesToAdd.push(service)


                  # Ocupamos las celdas
                  _.forEach(service.period, (period) ->
                    self.bussyCells[user.id].push period
                  )
            )

            self.services = _.union(self.services, servicesToAdd)

            deferred.resolve(users)
          , () ->
            deferred.reject()
          )

        return deferred.promise


      @preAssignToAllUsers = (date) ->
        self = this
        promises = self.users.map((user) ->
          self.removePreassignServicesByUserId(user.id)

          return self.createService({
            user_id: user.id
            start: date
            can_delete: true
          })
        )
        return $q.all(promises)


      @createService = (data) ->
        deferred = $q.defer()

        if !_.isUndefined @duration
          self = @
          data = _.extend {}, serviceDefaultData, data
          cells = getNextCellsFromStart(data.start)

          cellsdiff = _.difference(cells, @bussyCells[data.user_id])

          console.log cells, @bussyCells[data.user_id]

          if cellsdiff.length is cells.length
            if _.isEmpty data.end
              data.end = data.start.clone()
              data.end.add(@duration, 'minutes')

            data.start_unix = data.start.unix() if _.isEmpty data.start_unix
            data.end_unix = data.end.unix() if _.isEmpty data.end_unix

            data.start_data = createDateDataFromMoment(data.start) if _.isEmpty data.start_data
            data.end_data = createDateDataFromMoment(data.end) if _.isEmpty data.end_data
            data.duration = @duration if _.isEmpty data.duration

            data.start_week = data.start.week()

            # Añadiendo al usuario a asignados si es preasignación
            if data.is_preassign
              @removePreassignServicesByUserId(data.user_id)
              _assign = {
                id: data.user_id
                user_id: data.user_id
                start_at: data.start.format(defaultDateFormat)
                end_at: data.end.format(defaultDateFormat)
              }

              @assignUsers.push _assign

              $rootScope.$broadcast 'map:assign-to-user', _assign


            data.id = _.uniqueId('assign-')

            @services.push data


            # Ocupando las celdas si no es preasignado
            _.forEach(cells, (cell) ->
              self.bussyCells[data.user_id].push cell
            ) unless data.is_preassign

            deferred.resolve({
              service: data,
              cells: cells
            })

          else
            deferred.reject('Uno o más dias están ocupados.')
        else
          deferred.reject('Antes de asignar es necesario seleccionar un tipo de servicio.')

        return deferred.promise

      @removeService = (id) ->
        service = _.find(@services, {id: id})

        if service.can_delete
          _.remove(@services, service)
          _.remove(@assignUsers, {
            id: service.user_id
          })

          @cleanCellsUsed(service.user_id, service.start)

          # Ahora por medio de evento limpiamos el timeline
          $rootScope.$broadcast('map:remove-assign-from-user', service.user_id)


      @removePreassignServicesByUserId = (userId)->
        self = this
        servicesToClean = _.where(@services, {
          is_preassign: true
          user_id: userId
        })

        _.forEach(servicesToClean, (service) ->
          self.cleanCellsUsed(userId, service.start)
          _.remove(self.services, {id: service.id})
        )

        _.remove(@assignUsers, {
          id: userId
        })

        # Ahora por medio de evento limpiamos el timeline
        $rootScope.$broadcast('map:remove-assign-from-user', userId)


      @cleanCellsUsed = (user_id, start) ->
        self = this
        self.bussyCells[user_id] = _.difference(self.bussyCells[user_id], getNextCellsFromStart(start))