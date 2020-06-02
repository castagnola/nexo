/* controller */

/* CustomerCtrl */
app.controller("CustomerCtrl", function ($scope, $http,searchProvider, menu, $translate) {

	vm.menu = menu;


	url = 'assignments';
	attr = {};
	attr.url = url;
	var assignments = [];


	searchProvider.query(attr,'',function (response) {


		var data = response.data;

		if(data){
			angular.forEach(data, function(v, k) {
				if(v.is_today){
					assignments.push(v);	
				}
				
			});
		}

		vm.assignments = assignments;
		$scope.vm   = vm;
	});
	/*$http.get('/api/' + ctrl)
    .then(function(response) {
        vm.assignments = response.data.data;
    });
    $scope.vm       = vm;*/
});
