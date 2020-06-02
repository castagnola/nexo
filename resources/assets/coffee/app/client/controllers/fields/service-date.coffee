class ServiceDateField extends Controller
  constructor: ($rootScope, $scope, $log) ->
    ###*
    * Cuando se selecciona el tipo
    * @param {string} type
    ###
    onSelectServiceType = (type) ->
      $scope.model.date_type = type
      $scope.model.start_at = new Date() if _.isEmpty($scope.model.start_at)
      $scope.showSelectDateForm = type is 'schedule'

    ###*
    * Observando la nueva fecha de inicio
    * @param {object} newStartAtDate
    ###
    onWatchStartAt = (newStartAtDate) ->
      if !_.isUndefined(newStartAtDate) and !_.isUndefined($scope.model.service_type)
        newStartAtDate = moment(newStartAtDate) unless moment.isMoment(newStartAtDate)

        $scope.model.duration = moment.duration($scope.model.service_type.response_time).asMinutes()
        newEndAt = newStartAtDate.clone().add($scope.model.duration, 'minutes').toDate()

        _.set($scope.model, 'end_at', newEndAt)

        $log.debug 'Nueva fecha de programación del servicio', [$scope.model.start_at, $scope.model.duration, $scope.model.end_at]


    $scope.$on 'kendoWidgetCreated', (ev, datePicker) ->
      datePicker.setOptions
        interval: 5
        min: new Date()
        value: $scope.model.start_at or new Date()


    $scope.startAt = {}
    $scope.showSelectDateForm = false
    $scope.onSelectServiceType = onSelectServiceType


    $scope.$watch('model.start_at', onWatchStartAt)


