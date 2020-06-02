class CalendarAside extends Controller
  constructor: ($scope, $uibModalInstance) ->
    $scope.close = ->
      $uibModalInstance.dismiss('close')