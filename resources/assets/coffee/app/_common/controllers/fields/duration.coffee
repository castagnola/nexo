class DurationField extends Controller
  constructor: ($scope) ->
    key = $scope.options.key

    $scope.hours = _.range(0, 25)
    $scope.minutes = _.range(0, 65, 5)


    unwatchModel = $scope.$watch "model.#{key}", (nv) ->
      return if _.isUndefined(nv)


      duration = moment.duration(nv)

      $scope.model.hours = duration.hours()
      $scope.model.minutes = duration.asMinutes()

      unwatchModel()


    $scope.$watchGroup ['model.hours', 'model.minutes'], (nv) ->
      return if _.isEmpty(nv)

      newDurationAsDate = moment().hours(nv[0]).minutes(nv[1])

      $scope.model[key] = newDurationAsDate.format('HH:mm')