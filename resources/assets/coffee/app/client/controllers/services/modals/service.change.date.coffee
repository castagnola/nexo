class ServiceChangeDateModal extends Controller
  constructor: ($scope, $modalInstance, service, NEXO, DATES_FORMATS) ->
    $scope.currentDate = moment(service.start_at.date).toDate()
    $scope.minDate = new Date()
    $scope.minutesStep = NEXO.team.work_time_minutes or 15

    $scope.service = service
    $scope.formData = {
      date: $scope.currentDate
      time: $scope.currentDate
    }

    $scope.cancel = ->
      $modalInstance.dismiss('cancel')

    $scope.submit = ->
      $scope.$broadcast('show-errors-check-validity')

      if $scope.form.$valid
        $scope.submitting = true

        startAt = moment($scope.formData.date)
        startAttime = moment($scope.formData.time)

        startAt.hour(startAttime.hour()).minutes(startAttime.minutes()).seconds(0)

        endAt = startAt.clone().add(service.duration, 'minutes')

        service.DSUpdate({
          start_at : startAt.format(DATES_FORMATS.DATETIME),
          end_at : endAt.format(DATES_FORMATS.DATETIME)
        }).then((response) ->
          $modalInstance.close(response)
          toastr.success " El servicio #{response.code} se ha programado a #{startAt.format('LLLL')} correctamente."
        , (errorResponse) ->
          toastr.error "Hubo un error al programar el servicio #{service.code}, intentelo de nuevo más tarde."
          $scope.submitting = false
        )