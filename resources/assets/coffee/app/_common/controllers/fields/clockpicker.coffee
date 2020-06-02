class ClockpickerField extends Controller
  constructor: ($scope, DATES_FORMATS) ->
    key = $scope.options.key

    unwatchModel = $scope.$watch "model.#{key}", (nv) ->
      return if _.isUndefined(nv)

      $scope.model[key] = moment(nv, 'HH:mm:ss').format(DATES_FORMATS.HOUR_CLIENT)

      unwatchModel()