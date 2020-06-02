/* controller */


/* PollCtrl */
app.controller("PollCtrl", function ($scope, $http,searchProvider, $routeParams, menu, uiGmapGoogleMapApi, uiGmapIsReady,$mdDialog,$interval, $translate,Toasts,$location) {
		
	vm.menu = menu;
	vm.poll = NEXO.team.poll;
	vm.customer = NEXO.customer;

	var param1 = $routeParams.param1;
	var param2 = $routeParams.param2;

	$scope.starRating = 4;
	$scope.hoverRating = 0;

	$scope.answers = [];

	$scope.vm.onSubmit = function onSubmit() {
	            var vm = this;
	            var data =  vm.model;
	            var urlCreate = 'polls-answers/';
	            
	            attr = {};
	            attr.url = urlCreate;
	            attr.method = 'POST';
	            attr.params = data;

	            //console.log(data);

	            searchProvider.query(attr,'',function (response) {
	            	item = response;
	            	vm.item = item;

	            	Toasts.showActionToast({
	            		'content': $translate.instant('CUSTOMER.POLL.GRACIAS')
	            	});

	            	$location.path('/');
	            	
	            });
	}

	$scope.click = function (param) {
		$scope.vm.model.ranking = param;
        //console.log('Click(' + param + ')');
    };

    $scope.mouseHover = function (param) {
        //console.log('mouseHover(' + param + ')');
        //$scope.vm.model.ranking = param;
        $scope.hoverRating = param;
    };

    $scope.mouseLeave = function (param) {
        //console.log('mouseLeave(' + param + ')');
        //$scope.vm.model.ranking = param;
        $scope.hoverRating = param + '*';
    };


	url = 'polls/'+param1;
	attr = {};
	attr.url = url;
	attr.params = {include: 'questions', t: '1484076149796'};


	searchProvider.query(attr,'',function (response) {
		item = response;
		item.service = param2;
		vm.model  = response;
		vm.model.poll_id = NEXO.team.poll;
		vm.model.customer_id = NEXO.customer.id;
		vm.item = item;
	});
});