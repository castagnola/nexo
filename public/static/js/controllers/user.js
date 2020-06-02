/* controller */


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
	    vm.name = response.first_name+' '+response.last_name;
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

		//console.log('test search');

		google.maps.event.addListener(autocomplete,'place_changed', function() {
			var place = autocomplete.getPlace();
			if (place && place != 'undefined' && place.length != 0) {

				var lat = place.geometry.location.lat();
				var lng = place.geometry.location.lng();

				//console.log(place);

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

				//console.log('lat');
				//console.log(lat);
				//console.log('lng');
				//console.log(lng);

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
		newAddress.customer_id = customer.id;
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

	   	//console.log(newAddress);

		$scope.vm.model.addresses.data.push(newAddress);

		//console.log($scope.vm.model.addresses);
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
				//vm.name = response.first_name+' '+response.last_name;

	            searchProvider.query(attr,'',function (response) {
	            	item = response;
	            	vm.item = item;

	            	$scope.vm.name = item.name;

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

