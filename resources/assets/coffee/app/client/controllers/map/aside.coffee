class MapAside extends Controller
  constructor: ($scope, $uibModalInstance) ->
    $scope.close = ->
      $uibModalInstance.dismiss('close')