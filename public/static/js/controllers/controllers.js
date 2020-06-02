/* controller */

// calcular tiempos 
//https://developers.google.com/maps/documentation/directions/intro#Waypoints
//http://stackoverflow.com/questions/16773671/google-maps-api-getting-drive-time-and-road

//mostrar linea de trayectoria
//https://developers.google.com/maps/documentation/javascript/examples/directions-waypoints
//http://stackoverflow.com/questions/32264507/angularjs-ui-gmap-google-map-remove-driving-route
//https://devcenter2.appery.io/tutorials/angularjs/building-an-app-with-google-maps-and-angularjs/

/* InitCtrl */

app.controller("InitCtrl", function ($scope, $http,searchProvider, menu,$mdDialog, $translate,$window,Toasts,$location,$mdSidenav) {


	vm.menu = menu;

	vm.currentLang = NEXO.lang;

	template = "<md-dialog aria-label=\"Mango (Fruit)\"  ng-cloak>\n\n        <md-dialog-content>\n            <div class=\"md-dialog-content\">\n               <p translate=\"GLOBAL.CAMBIANDO_IDIOMA\"></p>\n            </div>\n        </md-dialog-content>\n</md-dialog>";

	vm.changeLang = function (langKey) {
		$mdDialog.show({
			template: template,
			parent: angular.element(document.body),
			clickOutsideToClose: false
		});


		url = 'users/change-lang/'
		attr = {};
		attr.url = url;
		attr.method = 'POST';
		attr.params = {lang: langKey};
		searchProvider.query(attr,'',function (response) {
			return $window.location.reload();
		});

		/*Store.mapper('user').changeLang(langKey).then(function () {
			
		});*/
	};

	//$mdSidenav('left').open();

	vm.openLeftMenu = function() {
		console.log('panel left side nav' );
    	//$mdSidenav('left').toggle();
    	jQuery('.open-menu').toggleClass('md-locked-open')
  	};	

	this.open = function openMenu(ev) {
		originatorEv = ev;
      	$mdMenu.open(ev);
	  };

	$scope.$mdOpenMenu = this.open;


	//console.log('vm.menu');
	//console.log(menu);
	//vm.logo = NEXO.team.logo;

	vm.logo = "/build/img/02533ec0742e995265c5a9f3438c3744.png";
	var user = NEXO.user;

	if(user.avatar){
		vm.logo = user.avatar;
	}

	$scope.vm   = vm;
	//console.log('InitCtrl');
});

/* CustomerCtrl */
app.controller("CustomerCtrl", function ($scope, $http,searchProvider, menu, $translate) {

	vm.menu = menu;


	url = 'assignments';
	attr = {};
	attr.url = url;



	searchProvider.query(attr,'',function (response) {
		vm.assignments = response.data;
		console.log(vm);
		$scope.vm   = vm;
	});
	/*$http.get('/api/' + ctrl)
    .then(function(response) {
        vm.assignments = response.data.data;
    });
    $scope.vm       = vm;*/
});

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
        console.log('Click(' + param + ')');
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

app.controller("UserCtrl", function ($scope, $http,searchProvider, $routeParams, menu, uiGmapGoogleMapApi, uiGmapIsReady,$mdDialog,$interval, $translate,CustomerForm,Toasts,$location,$timeout,$log,$mdMedia) {
		
	var param1 = $routeParams.param1;
	var markers = [];
	var address = [];

	customer = NEXO.customer;
	vm.customer = customer;

	var html = "";
	$scope.customFullscreen = $mdMedia('xs') || $mdMedia('sm');
	
	

	url = 'customers/'+param1;
	attr = {};
	attr.url = url;


	$scope.map = {
			control: {}
	};

	searchProvider.query(attr,'',function (response) {
		vm.user 	= response;
		vm.fields   = CustomerForm;
		vm.model    = response;
		

		$scope.model = {};

		var address = response.addresses.data;

	    if(address){

	    	$scope.options = {
	    		scrollwheel: false
	    	};
	    	$.each(address,function(k,v){
	    		if(v.latitude && v.longitude){
					var configMap = {
	    				id: v.id,
	    				center: {
	    					latitude: v.latitude,
	    					longitude: v.longitude
	    				},
	    				zoom: 16,
	    				isReady: true,
						control: {},
	    			};

	    			var configMaker ={
						id: v.id,
						coords: {
								latitude: v.latitude,
	    						longitude: v.longitude
						},
						options: {
							draggable: true,
							labelContent: "",
							labelAnchor: "100 0",
							labelClass: "marker-labels",
							key: k
						}
					};

	    			vm.model.addresses.data[k].maps = configMap;
	    			vm.model.addresses.data[k].marker = configMaker;
	    			
	    			if(vm.model.addresses.data[k].map == false){
	    				vm.model.addresses.data[k].map = true;
	    			}

	    			if(v.address){
	    				vm.model.addresses.data[k].isReady = true;
	    			}

	    			


	    			$scope.map = configMap;

					$scope.coordsUpdates = 0;
					$scope.dynamicMoveCtr = 0;

					//$scope.marker = configMaker;



					
	    		}
	    	});
	    }

	    $scope.croppedDataUrl = '/images/original/'+vm.model.avatar;
	    vm.logo = $scope.croppedDataUrl;
	    vm.model.avatar = '';
		$scope.vm   = vm;
	});

	$scope.markersEvents  = {
		dragend: function(marker, eventName, args, e) {

			var k = args.options.key;



			var geocoder = geocoder = new google.maps.Geocoder();

			var lat = marker.getPosition().lat();
			var lng = marker.getPosition().lng();
			$scope.vm.model.addresses.data[k].maps = {
				center: {
					latitude: lat,
					longitude: lng
				}
			};
			$scope.vm.model.addresses.data[k].marker = {
				coords: {
					latitude: lat,
					longitude: lng
				},
				options: {
					draggable: true,
					labelContent: "",
					labelAnchor: "100 0",
					labelClass: "marker-labels",
					key: k
				}
			};

			geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					lat = marker.getPosition().lat();
					lng = marker.getPosition().lng();
					address = results[0].formatted_address;
					$scope.vm.model.addresses.data[k].address = address;
					$scope.vm.model.addresses.data[k].latitude = lat;
					$scope.vm.model.addresses.data[k].longitude = lng;
				}
			});
		}
	};

	$scope.openResizeImageDialog = function () {
	        if ($scope.image) {
	            var useFullScreen = ($mdMedia('sm') || $mdMedia('xs')) && $scope.customFullscreen;
	            $mdDialog.show({
	                controller: "DialogCtrl",
	                templateUrl: window.NEXO.template_url+"client/crop",
	                parent: angular.element(document.body),
	                clickOutsideToClose: false,
	                fullscreen: useFullScreen,
	                locals: {
	                    image: $scope.image
	                }
	            }).then(function (croppedDataUrl) {
	                $scope.croppedDataUrl = croppedDataUrl;
	                $scope.vm.model.avatar = croppedDataUrl;
	            });
	        }
	}; 

	$scope.changeAddress = function changeAddress(obj,addresses,k){
		var element = event.target 

		var autocomplete = new google.maps.places.Autocomplete(element);

		console.log('test search');

		google.maps.event.addListener(autocomplete,'place_changed', function() {
			var place = autocomplete.getPlace();
			if (place && place != 'undefined' && place.length != 0) {

				var lat = place.geometry.location.lat();
				var lng = place.geometry.location.lng();

				console.log(place);

				$scope.vm.model.addresses.data[k].address = place.formatted_address;
				$scope.vm.model.addresses.data[k].latitude = lat;
				$scope.vm.model.addresses.data[k].longitude = lng;
				$scope.vm.model.addresses.data[k].vicinity = place.vicinity;
				$scope.vm.model.addresses.data[k].place_id = place.place_id;
				$scope.vm.model.addresses.data[k].is_autocompleted = 1;
				$scope.vm.model.addresses.data[k].map = '';

				$scope.vm.model.addresses.data[k].maps = {
					center: {
						latitude: lat,
						longitude: lng
					},
					zoom: 18
				};
				$scope.vm.model.addresses.data[k].marker = {
					coords: {
						latitude: lat,
						longitude: lng
					},
					options: {
						draggable: true,
						labelContent: "",
						labelAnchor: "100 0",
						labelClass: "marker-labels",
						key: k
					}
				};

				console.log('lat');
				console.log(lat);
				console.log('lng');
				console.log(lng);

				angular.element(element).change();
			}
		});


		/*google.maps.event.trigger(autocomplete, 'place_changed');
		console.log('trigger');*/
	};


	var newAddress = {};
	$scope.addNew = function addNew() {
		var latitude = 4.68475991;
		var longitude = -74.05250461;
		var id = $scope.vm.model.addresses.data.length+1; 

		newAddress.id = '';
		newAddress.isReady = true;
		newAddress.observations = '';
		var configMap = {
			id: id,
			center: {
				latitude: latitude,
				longitude: longitude
			},
			zoom: 16,
			isReady: true,
			control: {}
		};
		var configMaker ={
			id: id,
			coords: {
				latitude: latitude,
				longitude: longitude
			},
			options: {
				draggable: true,
				labelContent: "",
				labelAnchor: "100 0",
				labelClass: "marker-labels",
				key:id
			}
		};

		newAddress.maps = configMap;
	   	newAddress.marker = configMaker;

	   	console.log(newAddress);

		$scope.vm.model.addresses.data.push(newAddress);

		console.log($scope.vm.model.addresses);
	};

	var newPhones = {};
	$scope.addNewPhone = function addNewPhone() {
		newPhones.id = 0;
		//newPhones.type = {};
		newPhones.phone = '';
		$scope.vm.model.phones.data.push(newPhones);
	};


	$scope.vm.onSubmit = function onSubmit() {
	            var vm = this;

	            var model = vm.model;
	            var data =  unsetData(model);
	            var urlCreate = 'customers/'+customer.id;


	            /*//URL of Google Static Maps.
	            var staticMapUrl = "https://maps.googleapis.com/maps/api/staticmap";

	            //Set the Google Map Center.
	            staticMapUrl += "?center=" + mapOptions.center.lat() + "," + mapOptions.center.lng();

	            //Set the Google Map Size.
	            staticMapUrl += "&size=220x350";

	            //Set the Google Map Zoom.
	            staticMapUrl += "&zoom=" + mapOptions.zoom;

	            //Set the Google Map Type.
	            staticMapUrl += "&maptype=" + mapOptions.mapTypeId;

	            //Loop and add Markers.
	            for (var i = 0; i < markers.length; i++) {
	                staticMapUrl += "&markers=color:red|" + markers[i].lat + "," + markers[i].lng;
	            }*/

	            attr = {};
				attr.url = url;
				attr.method = 'PUT';	            
				attr.params = data;

				$scope.vm.logo = $scope.croppedDataUrl;

	            searchProvider.query(attr,'',function (response) {
	            	item = response;
	            	vm.item = item;

	            	Toasts.showActionToast({
	            		'content': $translate.instant('CUSTOMER.EDITAR.GRACIAS')
	            	});

	            	$location.path('/');
	            	
	            }); 
	}

	$scope.vm.confirmPasswordValidator =  function expression($viewValue, $modelValue, scope) {
	           /* var value;
	            value = $viewValue || $modelValue;
	            if (_.isEmpty(scope.model.password)) {
	                return true;
	            }
	            return _.isEqual(value, scope.model.password);
	        },
	        message: '"' + $translate.instant('FORMS.USER.LAS_CONTRASENAS_NO_COINCIDEN') + '"'*/
	};
});



/* AssignmentCtrl */
app.controller("AssignmentCtrl", function ($scope, $http,searchProvider, $routeParams, menu, uiGmapGoogleMapApi, uiGmapIsReady,$mdDialog,$interval, $translate,$translate) {
		
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


	url = 'assignments/'+param1;
	attr = {};
	attr.url = url;
	attr.params = {include: 'users,services,products,recurrence_date', t: '1484076149796'};

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

			if($.inArray(item.status.id,statuses) != -1){

				users = response.users.data;

				assignments = [];
				timeservices = [];

				team.latitude = 4.2923662;
				team.longitude = -74.1973291;

				if(users){
					$.each(users,function(k,v){
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
					isReady: true,
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
				isReady: false
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


				if(users){
					$.each(users,function(k,v){
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


				//origin = team;
				destination = item;

				$scope.directions = {
					origin: origin,
					destination: destination,
					waypoints:assignments
				};

				console.log('updateClock');
				console.log($scope.directions);

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
							distance.duration = convertTime(totalTime);
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
	
	//$interval(updateClock, 100000);
});