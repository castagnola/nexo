/* controller */

/* AssignmentCtrl */
app.controller("AssignmentCtrl", function ($scope, $http,searchProvider, $routeParams, menu, uiGmapGoogleMapApi, uiGmapIsReady,$mdDialog,$interval, $translate) {
		
	vm.menu = menu;
	vm.poll = NEXO.team.poll;


	var param1 = $routeParams.param1;
	var users = [];
	var services = [];
	var markers = [];
	var origin = [];
	var destination = [];
	var assignments = [];
	var statuses = [3,4,10];
	var timeservices = [];
	var team = [];
	var waypts = [];
	var gmap = [];
	var latitude = 4.6482837;
	var longitude = -74.2478957;
	var total = 0;
	var position = 0;
	var isReady = false;


	url = 'assignments/'+param1;
	attr = {};
	attr.url = url;
	attr.params = {include: 'users,services,products,recurrence_date,accepted', t: '1484076149796'};

	$scope.map = {
			control: {}
	};

	$scope.questionary = {
		isReady: false
	}


	searchProvider.query(attr,'',function (response) {

		item = response;

		//console.log(item);

		vm.item = item;

		if(item.is_today){

			console.log(item.status.id);
			console.log(statuses);
			console.log($.inArray(item.status.id,statuses));


			if($.inArray(item.status.id,statuses) != -1){

				users = response.users.data;
				accepted = response.accepted.data;

				if(accepted.length > 0 && $.inArray(item.status.id,[10]) != -1){

					isReady = true;

					total = accepted[0].geolocalizations.data.length;

					if(total == 0){

						isReady = false;

						var msg = '';
						msg = $translate.instant('CUSTOMER.ASIGNACION.SIN_UBICACION');
						alert = $mdDialog.alert()
								.title('Atencion')
								.content(msg)
								.ok('Cerrar');

						$mdDialog.show( alert )
						.finally(function() {
							alert = undefined;
						});

						return false;

					}else{

						isReady = true;

						geolocalizations = accepted[0].geolocalizations.data;

						console.log(accepted);
						console.log(geolocalizations);

						if(geolocalizations){

							//position = total-1;
							position = 0;
							latitude = geolocalizations[position].latitude;
							longitude = geolocalizations[position].longitude;
						}

						console.log(latitude);
						console.log(longitude);
					}

					
				}else{

					isReady = false;

					var msg = '';
					msg = $translate.instant('CUSTOMER.ASIGNACION.NO_ACEPTADA');
					alert = $mdDialog.alert()
								.title('Atencion')
								.content(msg)
								.ok('Cerrar');

					$mdDialog.show( alert )
							.finally(function() {
								alert = undefined;
							});
				}

				assignments = [];
				timeservices = [];

				console.log(latitude);
				console.log(longitude);

				team.latitude = latitude;
				team.longitude = longitude;


				if(accepted.length > 0 && $.inArray(item.status.id,[10]) != -1){
					$.each(accepted,function(k,v){
						services = v.services.data;
						if(services){
								$.each(services,function(i,j){
									var obj = [];
									obj = j;

									//valid is today
									if(j.is_today){

										if(obj.code == item.code){
											return false;
										}

										if($.inArray(j.status.id,statuses) != -1){
											timeservices.push(obj.duration);
											//waypts.push(obj);
											assignments.push(obj);
										}

										// Add time services status En ejecucion
										if($.inArray(j.status.id,[5]) != -1){
											timeservices.push(obj.duration);
										}
									}
								});
						}
					})	
				}


				origin = team;
				destination = item;

				$scope.map = { 
					center: { latitude: response.latitude, longitude: response.longitude }, 
					zoom: 10 ,
					isReady: isReady,
					control: {}
				};

				$scope.directions = {
					origin: origin,
					destination: destination,
					waypoints:assignments
				};

				uiGmapGoogleMapApi.then(function(map) {
					setTimeout(function(){
						var directionsService = $scope.map.directionsService,
						directionsDisplay = $scope.map.directionsDisplay,
						gmap = $scope.map.instance;

						if (!directionsService) {
							$scope.map.directionsService = directionsService = new google.maps.DirectionsService();
							$scope.map.directionsDisplay = directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: false});
						}
						if (!gmap) {
							$scope.map.instance = gmap = $scope.map.control.getGMap();
						}

						origin = $scope.directions.origin;
						destination = $scope.directions.destination;
						waypoints = $scope.directions.waypoints;
						waypts = [];


						if(waypoints){
							$.each(waypoints,function(p,v){
								waypts.push({
									location: new google.maps.LatLng(v.latitude,v.longitude),
									stopover: false
								});
							});

						}


						var request = {
							origin: new google.maps.LatLng(origin.latitude,origin.longitude),
							destination: new google.maps.LatLng(destination.latitude,destination.longitude),
							waypoints: waypts,
							optimizeWaypoints: true,
							travelMode: google.maps.TravelMode.DRIVING
						};


						directionsService.route(request, function(response, status) {
							directionsDisplay.setMap(gmap);
							distance = computeTotalDistance(response);
							sumServices = timeservices.reduce(sum,0);
							totalTime = sumServices+distance.time;
							distance.duration = convertTime(totalTime,$translate);
							vm.distance = distance;

							if (status == google.maps.DirectionsStatus.OK) {
								directionsDisplay.setDirections(response);
							} else {
								console.log("Directions query unsuccessful. Response status: " + status);
							}
						});


						$scope.vm   = vm;
					},  1000);
				});
			}

		}else{
			$scope.map = {
				isReady: isReady
			}

			var msg = '';

			if($.inArray(item.status.id,statuses) != -1){

				
				var endDate = new Date(item.end_at.date);
				var now = new Date();


				
				if(item.date_type == 'schedule'){
					msg = $translate.instant('CUSTOMER.ASIGNACION.PROGRAMADA');
				}else if(now > endDate){
					msg = $translate.instant('CUSTOMER.ASIGNACION.PASADA');
				}else{
					msg = $translate.instant('CUSTOMER.ASIGNACION.NO_ASIGNADO');
				}
				

				alert = $mdDialog.alert()
								.title('Atencion')
								.content(msg)
								.ok('Cerrar');

				$mdDialog.show( alert )
							.finally(function() {
								alert = undefined;
							});
			}else{
				
			}
		}


		if($.inArray(item.status.id,[6]) != -1){
			$scope.questionary = {
				isReady: true
			}
		}

	});

	// 1. tiempo 10 mn para refrescar
	// 2. Origen dinamico



	var updateClock = function() {
		searchProvider.query(attr,'',function (response) {

			timeservices = [];

			item = response;
			vm.item = item;

			if(item.is_today){

				users = response.users.data;
				accepted = response.accepted.data;


				if(accepted.length > 0 && $.inArray(item.status.id,[10]) != -1){

					total = accepted[0].geolocalizations.data.length;
					isReady = true;
					if(total == 0){
						isReady = false;
						var msg = '';
						msg = $translate.instant('CUSTOMER.ASIGNACION.SIN_UBICACION');
						alert = $mdDialog.alert()
								.title('Atencion')
								.content(msg)
								.ok('Cerrar');

						$mdDialog.show( alert )
						.finally(function() {
							alert = undefined;
						});

						return false;

					}else{
						isReady = true;
						geolocalizations = accepted[0].geolocalizations.data;

						if(geolocalizations){

							//position = total-1;
							position = 0;
							latitude = geolocalizations[position].latitude;
							longitude = geolocalizations[position].longitude;
						}
					}

					
				}else{
					isReady = false;
					var msg = '';
					msg = $translate.instant('CUSTOMER.ASIGNACION.NO_ACEPTADA');
					alert = $mdDialog.alert()
								.title('Atencion')
								.content(msg)
								.ok('Cerrar');

					$mdDialog.show( alert )
							.finally(function() {
								alert = undefined;
							});
				}


				if(accepted.length > 0 && $.inArray(item.status.id,[10]) != -1){
					$.each(accepted,function(k,v){
						services = v.services.data;
						if(services){

							$.each(services,function(i,j){

								var obj = [];
									obj = j;
								//valid is today
								if(j.is_today){

									if(obj.code == item.code){
										return false;
									}

									if($.inArray(j.status.id,statuses) != -1){
										timeservices.push(obj.duration);
										//waypts.push(obj);
										assignments.push(obj);
									}

									// Add time services status En ejecucion
									if($.inArray(j.status.id,[5]) != -1){
										timeservices.push(obj.duration);
									}
								}
							});
						}
					})	
				}

				var team = {};
				team.latitude = latitude;
				team.longitude = longitude;

				origin = team;
				destination = item;

				$scope.directions = {
					origin: origin,
					destination: destination,
					waypoints:assignments
				};

				uiGmapGoogleMapApi.then(function(map) {
					setTimeout(function(){
						var directionsService = $scope.map.directionsService,
						directionsDisplay = $scope.map.directionsDisplay,
						gmap = $scope.map.instance;

						if (!directionsService) {
							$scope.map.directionsService = directionsService = new google.maps.DirectionsService();
							$scope.map.directionsDisplay = directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: false});
						}

						origin = $scope.directions.origin;
						destination = $scope.directions.destination;
						waypoints = $scope.directions.waypoints;
						waypts = [];


						if(waypoints){
							$.each(waypoints,function(p,v){
								waypts.push({
									location: new google.maps.LatLng(v.latitude,v.longitude),
									stopover: false
								});
							});

						}
						

						var request = {
						    origin: new google.maps.LatLng(origin.latitude,origin.longitude),
						    destination: new google.maps.LatLng(destination.latitude,destination.longitude),
						    waypoints: waypts,
						    optimizeWaypoints: true,
						    travelMode: google.maps.TravelMode.DRIVING
						};


						directionsService.route(request, function(res, status){

							directionsDisplay.setMap(gmap);
							distance = computeTotalDistance(res);
							sumServices = timeservices.reduce(sum,0);
							totalTime = sumServices+distance.time;
							distance.duration = convertTime(totalTime,$translate);
							console.log('distance');
							console.log(distance);
							vm.distance = distance;

							if (status == google.maps.DirectionsStatus.OK) {
								directionsDisplay.setDirections(res);
							} else {
								console.log("Directions query unsuccessful. Response status: " + status);
							}
						});


						$scope.vm   = vm;
					},  1000);
				});

			}

		});
	};
	
	$interval(updateClock, 300000); 
});  