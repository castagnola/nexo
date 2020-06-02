class NexoTimeline extends Directive
  constructor: ($log, $window, $document, DATES_FORMATS, TEMPLATE_URL, UI_URL, $http, $timeout, Service, User, $q, Timeline) ->
    directive = {
      restrict: 'EAC'
      templateUrl: "#{TEMPLATE_URL}timeline.table"
      scope: {
        serviceDuration: '=nexoTimelineServiceDuration'
        servicesStepDuration: '=nexoTimelineServicesStepDuration'
        preAssignMode: '=nexoTimelinePreassignMode'
        preAssignedUsers: '=nexoTimelinePreassignedUsers'
        services: '=nexoTimelineServices'
      }

      controller: ['$rootScope', '$scope', '$element', '$attrs', ($rootScope, $scope, $element, $attrs) ->
        $scope.gridIsRendered = false
        $scope.cellWidth = 40
        $scope.baseWidth = $scope.cellWidth * 8
        $scope.hoursQty = 0
        $scope.tableWidthPx = 0
        $scope.preAssignDuration = 0
        $scope.preAssignServices = []
        $scope.preAssingServicesRendered = []
        $scope.services = []
        $scope.initialDay = moment().startOf('isoWeek')
        $scope.initialHour = 1
        $scope.endHour = 23
        $scope.preAssignedUsers = Timeline.assignUsers

        # Services step duration?
        if _.isUndefined($scope.servicesStepDuration) or _.isEmpty($scope.servicesStepDuration)
          $scope.servicesStepDuration = 30

        if _.isUndefined($scope.initialHour) or _.isEmpty($scope.initialHour)
          $scope.initialHour = 0

        if _.isUndefined($scope.endHour) or _.isEmpty($scope.endHour)
          $scope.endHour = 24


        Timeline.setStepDuration($scope.servicesStepDuration)
        # Observando la duración para settearla
        $scope.$watch(() ->
          return $scope.serviceDuration
        , (serviceDuration) ->
          unless _.isUndefined(serviceDuration)
            Timeline.setDuration moment.duration(serviceDuration).asMinutes()
        )

        # Initial hour is string?
        unless _.isNumber $scope.initialHour
          $scope.initialHour = moment($scope.initialHour, 'HH:mm:ss').hour()
        unless _.isNumber $scope.endHour
          $scope.endHour = moment($scope.endHour, 'HH:mm:ss').hour()

        $scope.prevWeek = () ->
          $scope.initialDay.subtract(1, 'week')
          $scope.$broadcast 'render-days'

        $scope.nextWeek = () ->
          $scope.initialDay.add(1, 'week')
          $scope.$broadcast 'render-days'


        $rootScope.$on 'timeline:preassign-all-users', ($event, data) ->
          if $scope.initialDay.week() isnt data.date.week()
            $scope.initialDay = data.date.clone().startOf('isoWeek')
            $scope.$broadcast 'render-days'

          date = data.date.clone().seconds(0)

          if date.minutes() > 0
            newMinutes = Math.floor(data.date.minutes() / $scope.servicesStepDuration) * $scope.servicesStepDuration
            date.minutes(newMinutes)

          $scope.$broadcast 'go-to-datetime', date

          Timeline.preAssignToAllUsers(date).then(null, () ->
            bootbox.alert('Puede que uno o más ruteros no hayan sido asignados porque el tiempo está ocupado. Ejecute la asignación manualmente.');
          )


        $rootScope.$on 'timeline:create-assign-to-user', (e, data) ->
          Timeline.createService({
            user_id: data.user_id,
            start: moment(data.start_at)
            can_delete: true
          })

        $rootScope.$on 'timeline:remove-assign-by-user', (e, userId) ->
          Timeline.removePreassignServicesByUserId(userId)
      ]

      compile: (element, attrs) ->
        pre: ($scope, element, attrs) ->
          self = this
          $content = element.find('.nexo-timeline-content')
          $contentTable = angular.element('#nexo-timeline-content-table');
          $headerWrap = element.find('.nexo-timeline-header .nexo-timeline-wrap')
          $daysWrap = angular.element '#nexo-timeline-table-header-days'
          $hoursWrap = angular.element '#nexo-timeline-table-header-hours'
          $hoursDivisionsWrap = angular.element '#nexo-timeline-table-header-hours-divisions'
          $servicesWrap = angular.element '#nexo-timeline-services'
          $usersWrap = angular.element '#nexo-timeline-users-wrap'

          today = moment()

          # Ancho base para las celdas
          cellWidthBase = 80
          # Cantidad de horas
          hoursQty = $scope.endHour - $scope.initialHour
          # Divisiones en las horas
          hourDivisions = 60 / $scope.servicesStepDuration

          daysQty = 0
          rangeDays = []
          rangeHours = _.range($scope.initialHour, $scope.endHour)
          rangeHoursDivisions = _.range(0, $scope.servicesStepDuration * hourDivisions, $scope.servicesStepDuration)

          # Events
          $content.on('scroll', () ->
            $headerWrap.scrollLeft($(this).scrollLeft())
          )


          # Pintando dias
          firstRender = true

          renderDays = () ->
            $scope.endDay = $scope.initialDay.clone().endOf('isoWeek')
            daysQty = Math.round($scope.endDay.clone().endOf('day').diff($scope.initialDay.clone().startOf('day'), 'd', true))
            $wrap = $daysWrap

            $wrap.empty()
            $hoursWrap.empty()
            $hoursDivisionsWrap.empty()

            dayIndex = 0

            $scope.momentRangeDays = moment.range($scope.initialDay, $scope.endDay).by('d', (day) ->
              diffWithToday = today.diff(day, 'h')
              isToday = (diffWithToday > 0 and diffWithToday < 24)
              classEven = if dayIndex % 2 == 0 then 'even' else 'odd'

              $dayTh = angular.element("<th />", {
                html: day.format('dddd, LL')
                colspan: hoursQty * hourDivisions
                'data-is-today': isToday
                'class': "#{classEven} #{if isToday then 'today' else ''}" # Odd or Even?
              }).appendTo($wrap)


              _.forEach rangeHours, (hour) ->
                dayMoment = day.clone().hour(hour).minutes(0)

                angular.element('<th />', {
                  text: dayMoment.format('hh:mm A')
                  colspan: hourDivisions
                  'class': classEven
                }).appendTo($hoursWrap)

                _.forEach rangeHoursDivisions, (hourDivision) ->
                  hourDivisionDate = dayMoment.clone().minutes(hourDivision)
                  angular.element('<th />', {
                    'data-unix': hourDivisionDate.unix()
                  }).appendTo($hoursDivisionsWrap)
                  .data('moment', hourDivisionDate)

              if isToday
                $('<span />', {
                  'class': 'ml label label-info label-xs text-uppercase',
                  text: 'Hoy'
                }).appendTo($dayTh)


              # Agregamos a la variable global del rango de días (para iterar más rápido)
              rangeDays.push day
              dayIndex++
            )
            $content.scrollLeft(0)
            $headerWrap.scrollLeft(0)

            # Si existe el día de hoy hacer scroll hasta allá
            if firstRender
              $todayTh = angular.element '[data-is-today="true"]'
              if $todayTh.length
                $timeout ->
                  $content.scrollLeft($todayTh.position().left)
                  firstRender = false
                , 1500

            # Renderizamos servicios
            $timeout ->
              self.searchAndRenderWeekServices()

          # Pintanto los días
          renderGrid = (users) ->
            $scope.users = users
            # Pintando grilla por usuarios
            _.forEach users, (user) ->
              $tr = angular.element('<tr />').appendTo($contentTable)

              # Iteramos el rango de días para comenzar a crear las celdas
              _.forEach rangeDays, (_day, _dayIndex) ->
                _.forEach rangeHours, (_hour) ->
                  _.forEach rangeHoursDivisions, (_hourDivision) ->
                    angular.element('<td />', {
                      html: '&nbsp;'
                      'class': "nexo-timeline-half #{if _dayIndex % 2 == 0 then 'even' else 'odd'}"
                      click: createPreassignService
                    }).appendTo($tr)


            $scope.gridIsRendered = true

            tableWrapWidth = (cellWidthBase * hoursQty) * daysQty
            angular.element('.nexo-timeline-table-wrap').width(tableWrapWidth)


          __getDayElementByIndex = (index) ->
            return $hoursDivisionsWrap.find("th:eq(#{index})")

          __getDateByIndex = (index) ->
            return __getDayElementByIndex(index).data('moment')

          __getUserIdByindex = (index) ->
            return $usersWrap.find("tr:eq(#{index})").data('userId')

          __getCellByUserAndUnix = (userId, unix) ->
            dateIndex = angular.element("[data-unix='#{unix}']").index()
            userIndex = angular.element("[data-user-id='#{userId}']").index()
            return angular.element $contentTable.find("tr:eq(#{userIndex}) td:eq(#{dateIndex})")

          # ==== Creando el servicio preasignado
          createPreassignService = () ->
            $element = angular.element this

            date = __getDateByIndex($element.index())
            userId = __getUserIdByindex($element.parent().index())

            Timeline.createService({
              user_id: userId,
              start: date
              can_delete: true
            }).then(null, (error) ->
              $log.error 'Error creando servicio desde timeline', error
            )

          # ==== Destruyendo el servicio (Solo preasignados por el momento)
          angular.element($document).on('click', '.nexo-timeline-service', () ->
            $element = angular.element this
            $scope.$apply ->
              Timeline.removeService($element.data('service-id'))
          )

          renderService = ->
            service = this
            $cell = __getCellByUserAndUnix(service.user_id, service.start_unix)
            html = '<div>Preasignado</div>'

            if _.has(service, 'name') and _.has(service, 'code')
              html = "<div>#{service.name}</div><div class='code'>##{service.code}</div>"

            $('<div />', {
              'class': "nexo-timeline-service #{service.extraClass or ''} nexo-service-#{service.status_slug or 'preassigned'}"
              html: html
              id: "nexo-timeline-service-#{service.id}"
              'data-service-id': service.id
              'data-start': service.start
            }).wrapInner('<div class="nexo-service-wrap" />').css({
              top: $cell.position().top,
              left: $cell.position().left,
              width: $cell.outerWidth(true) * (service.duration / $scope.servicesStepDuration)
              height: $cell.outerHeight(true)
            }).appendTo($servicesWrap)

          # broadcast
          $scope.$on 'render-days', renderDays

          # Go to current exactly moment
          $scope.$on 'go-to-datetime', (e, date) ->
            $timeout ->
              $hourDivisionTh = angular.element("[data-unix='#{date.unix()}']")
              $gotoCell = $contentTable.find("td:eq(#{$hourDivisionTh.index()})")
              newScroll = $gotoCell.position().left - ($content.outerWidth(true) / 2)
              $content.animate({
                scrollLeft: newScroll
              })  if $gotoCell.length


          self.searchAndRenderWeekServices = (services) ->
            currentWeek = $scope.initialDay.week()
            services = Timeline.services if _.isUndefined services
            return renderServices(_.where(services, {start_week: $scope.initialDay.week()}))

          renderServices = (services) ->
            $servicesWrap.empty()
            _.invoke(services, renderService)

          # Observando para renderizar servicios
          $scope.$watch(() ->
            return Timeline.services
          , (newServices, oldServices) ->
            unless _.isEqual(newServices, oldServices)
              self.searchAndRenderWeekServices(newServices)
          , true)


          # Llamando lo primero
          Timeline.getUsers().then((users) ->
            renderDays()
            renderGrid(users)
          )
    }

    return directive