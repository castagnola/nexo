class SelectDateModal extends Controller
  constructor: ($scope, $uibModalInstance, date, creationData) ->
    currentDateMinutes = date.minutes()

    if currentDateMinutes > 0 and currentDateMinutes isnt creationData.workTimeMinutes

      newMinutes = Math.floor(currentDateMinutes / creationData.workTimeMinutes) * creationData.workTimeMinutes
      date.minutes(newMinutes)

      if newMinutes < currentDateMinutes
        date.add(creationData.workTimeMinutes, 'minutes')


    $scope.selectDateData = {
      date: date.seconds(0).toDate(),
      time: date.seconds(0).toDate()
    }

    $scope.submit = () ->
      $scope.$broadcast('show-errors-check-validity')

      if $scope.selectDateForm.$valid
        newDate = moment($scope.selectDateData.date)
        newTime = moment($scope.selectDateData.time)
        $uibModalInstance.close(newDate.hour(newTime.hour()).minutes(newTime.minutes()))

    $scope.cancel = () ->
      $uibModalInstance.dismiss('cancel')

