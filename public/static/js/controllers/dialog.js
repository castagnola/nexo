/* controller */

/* UserCtrl */
app.controller("DialogCtrl", function ($scope, $mdDialog, image) {

	$scope.croppedDataUrl = '';
	$scope.image = image;
	
	$scope.hide = function () {
		$mdDialog.hide();
	};
	$scope.cancel = function () {
		$mdDialog.cancel();
	};
	$scope.save = function () {
		$mdDialog.hide($scope.croppedDataUrl);
	};
});
