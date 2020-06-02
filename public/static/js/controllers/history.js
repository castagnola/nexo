/* controller */

/* CustomerCtrl */
app.controller("HistoryCtrl", function ($scope, $http,searchProvider, menu, $translate) {

	vm.menu = menu;


	url = 'assignments';
	attr = {};
	attr.url = url;



	searchProvider.query(attr,'',function (response) {
		vm.assignments = response.data;
		//console.log(vm);
		$scope.vm   = vm;
	});
	/*$http.get('/api/' + ctrl)
    .then(function(response) {
        vm.assignments = response.data.data;
    });
    $scope.vm       = vm;*/
});
