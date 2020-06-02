class Notifications extends Controller
  constructor: ($scope, $window, Notification, NexoSocket) ->
    Notification.findAll({
      orderBy: 'created_by'
      sortedBy: 'desc',
      search: 'readed:0'
    })

    Notification.bindAll({}, $scope, 'notifications')

    $scope.openNotification = (notification) ->
      notification.DSUpdate({
        readed: 1
      }).then((response) ->
        return $window.location.href = response.url
      )

    NexoSocket.forward 'notification-created', $scope

    $scope.$on 'socket:notification-created', (ev, data) ->
      Notification.find(data.id)