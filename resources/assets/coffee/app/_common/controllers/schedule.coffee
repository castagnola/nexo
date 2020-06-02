class Schedule extends Controller
  constructor: ($log, $rootScope, $scope, $timeout, User, NexoEvent) ->
    $scope.timelineLoading = true
    $scope.events = []
    $scope.resources = []

    paramsToBindUsers = {}

    events = new kendo.data.ObservableArray([])
    $scope.ds = new kendo.data.SchedulerDataSource({
      data: []
      schema: {
        model: {
          id: "id",
          fields: {
            user_id: {from: "user_id", type: "number"},
            title: {from: "title", defaultValue: "Preasignación"},
            start: {type: "date", from: "start"},
            end: {type: "date", from: "end"},
            code: {type: 'string', from: 'code', required: false}
            is_temp: {type: 'boolean', from: 'is_temp', defaultValue: false, required: false},
            status: {type: 'string', from: 'status', defaultValue: 'preasignado', required: false}
          }
        }
      }
    })


    $scope.schedulerOptions =
      messages: {
        today: "Hoy"
      }
      date: moment().toDate(),
      startTime: moment().hour(0).minutes(0).toDate(),
      editable: {
        destroy: false
        create: false
        move: false
        resize: false
        update: false
      }
      eventHeight: 30
      majorTick: 60
      eventTemplate: $("#event-template").html()
      views: [
        {
          type: 'timeline'
          title: 'Día'
        }
        {
          type: 'timelineWeek'
          title: 'Semana'
        }
        {
          type: "timelineMonth",
          title: 'Mes'
          startTime: moment().startOf('day').toDate(),
          majorTick: 1440
        }
      ]
      timezone: 'Etc/UTC'

      group:
        resources: [
          'Ruteros'
        ]
        orientation: 'vertical'

      dataSource: $scope.ds
      resources: [{
        field: 'user_id'
        name: 'Ruteros'
        multiple: false
        title: 'Ruteros'
        dataSource: $scope.resources
      }]


    User.bindAll paramsToBindUsers, $scope, 'users', (cb, users) ->
      _.forEach(users, (user) ->
        $scope.resources.push
          text: "#{user.name}"
          value: user.id
      )

    $scope.$on "kendoWidgetCreated", () ->
      NexoEvent.bindAll({}, $scope, 'events', (cb, _events) ->
        newEvents = []

        $log.debug 'Calendario: eventos recibidos', _events

        _.forEach _events, (_event) ->
          event = _.clone _event
          event.start = if moment.isMoment(event.start) then event.start.toDate() else kendo.parseDate(event.start)
          event.end = if moment.isMoment(event.end) then event.end.toDate() else kendo.parseDate(event.end)

          console.log event

          newEvents.push new kendo.data.SchedulerEvent(event)

        $scope.nexoScheduler.dataSource.data(newEvents)

        lastTemp = _.last(_.where(newEvents, {is_temp: true}))

        unless _.isEmpty(lastTemp)
          $scope.moveToEvent lastTemp
      )




