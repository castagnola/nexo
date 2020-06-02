class UserCalendar extends Controller
  constructor: ($scope, $uibModalInstance, user) ->
    $scope.close = ->
      $uibModalInstance.dismiss('cancel')

    $scope.user = user

    $scope.schedulerOptions = {
      date: moment().toDate(),
      startTime: moment().hour(0).minutes(0).toDate(),
      eventHeight: 30
      majorTick: 60
      height: 450,
      editable: false
      views: [
        {
          type: 'day'
          title: 'Día'
        }
        {
          type: 'week'
          title: 'Semana'
          selected: true
        }
        {
          type: "month",
          title: 'Mes'
        }
      ]
      dataSource: {
        batch: true,
        transport: {
          read: {
            url: "/api/users/#{user.id}/events"
          }
        }

      }
      resources: [
        {
          field: "user_id",
          title: "User",
          dataSource: [
            {text: user.name, value: user.id}
          ]
        }
      ]
    }
