/* init app customer */

var vm = {};
var app = angular.module('customer', ['ngRoute','angularMoment','uiGmapgoogle-maps','ngMaterial','pascalprecht.translate','ngFileUpload','ngImgCrop'],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });



app.factory('httpRequestInterceptor', function () {
	var token = window.NEXO.token,
		teamId = window.NEXO.team.id,
		lang = window.NEXO.lang;
  return {
    request: function (config) {
    	config.headers['Authorization'] = 'Bearer '+ token;
    	if (teamId) {
    		config.headers['Team-Account-ID'] = teamId;
    	}
    	if (lang) {
    		config.headers['Lang'] = lang;
    	}
      return config; 
    }
  };
});


//traslate
app.config(function ($translateProvider) {

  $translateProvider.useStaticFilesLoader({
    prefix: 'language/',
    suffix: ''
  });

  //$translateProvider.translations('es', _app2.default);
  //$translateProvider.translations('pt', _app4.default);
  
  $translateProvider.preferredLanguage(window.NEXO.lang || 'es');
  $translateProvider.useSanitizeValueStrategy(null);
});


app.config(function ($httpProvider) {
  $httpProvider.interceptors.push('httpRequestInterceptor');
});

app.config(function(uiGmapGoogleMapApiProvider) {
    uiGmapGoogleMapApiProvider.configure({
        //key: 'AIzaSyCn2bnhGpJdsotp7ZLPq-3n8ZnALZMZa10',
        key: 'AIzaSyC2vBv3u8HF4pQbJ5kRMnh-GVPu22V_PE0',
         //  v: '3.20', //defaults to latest 3.X anyhow
        libraries: 'weather,geometry,visualization,places'
    });
})


app.factory('searchProvider',function($http) {
        return {
            query: function (attr,request, callback) {
              customer = window.NEXO.customer;
              att = {};
              params = {};
              request = {limit:500,customer_id:customer.id};


              //console.log('params');
              if(attr.params){
                params = attr.params;
                //console.log(params);
                //request = $.merge(request,params);
                request = params;
              }

              method = 'GET';

              if(attr.method != undefined){
                  method = attr.method;
              }

              if(attr.prefix == undefined){
                  prefix = '/api/';
              }else{
                prefix = '';
              }


              //console.log('attr');
              //console.log(attr);

              if(method == 'POST'){
                var config = {};
                 $http.post(prefix+attr.url, request, config)
                 .success(function (data, status, headers, config) {
                  callback(data);
                })
              }else if(method == 'PUT'){
                var config = {};
                 $http.put(prefix+attr.url, request, config)
                 .success(function (data, status, headers, config) {
                  callback(data);
                })
              }else{
                $http({
                    url: prefix+attr.url,
                    method: method,
                    params: request,
                    transformRequest: function (data, headersGetter) {
                        if (data == undefined) {
                            return data;
                        }

                        //return $.param(data);
                    }
                })
                .success(function (data) {
                    callback(data);
                });
              }


                
            }
        }
  });

app.factory('menu',function($http) {
         return [
              {
                name: 'DASHBOARD',
                url: '/customer'
              },{
                  name: 'CUSTOMER.HISTORIAL.MENU',
                  url: '#/historial/' 
              },{
                  name: 'CUSTOMER.EDITAR.MENU',
                  url: '#/clientes/'+NEXO.customer.id+'/editar' 
              }
          ];

          /*{
              name: 'ASIGNACIONES',
              url: '/asignaciones'
          }, {
              name: 'CONFIGURACION',
              children: [{
                  name: 'PRODUCTOS.PRODUCTOS',
                  url: 'productos'
              }, {
                  name: 'SERVICIOS',
                  url: 'servicios'
              }, {
                  name: 'CLIENTES',
                  url: 'clientes'
              }, {
                  name: 'USUARIOS',
                  url: 'usuarios'
              }]
          }, {
              name: 'ESTADISTICAS.ESTADISTICAS',
              children: [{
                  name: 'ESTADISTICAS.POR_ESTADO',
                  url: 'estadisticas.servicios'
              }, {
                  name: 'ESTADISTICAS.POR_RUTERO',
                  url: 'estadisticas.ruteros'
              }, {
                  name: 'ESTADISTICAS.ENCUESTAS',
                  url: 'estadisticas.encuestas'
              }]
          }*/
  });

app.factory('Toasts',function($mdToast) {
         return { showActionToast: showActionToast };
  
         function showActionToast(options) {
          var _options$content = options.content;
          var content = _options$content === undefined ? '' : _options$content;
          var _options$action = options.action;
          var action = _options$action === undefined ? 'Ok' : _options$action;
          var _options$highlight = options.highlight;
          var highlight = _options$highlight === undefined ? false : _options$highlight;
          var _options$position = options.position;
          var position = _options$position === undefined ? 'top right' : _options$position;


          var toast = $mdToast.simple().textContent(content).action(action).highlightAction(highlight).position(position);

          $mdToast.show(toast).then(function () {
            $mdToast.hide(toast);
          });
        }
  });

app.factory('CustomerForm',function($translate) {
         var fields = {
          basic: [{
              key: 'first_name',
              type: 'input',
              templateOptions: {
                  label: $translate.instant('FORMS.CUSTOMER.NOMBRES'),
                  required: true
              }
          }, {
              key: 'last_name',
              type: 'input',
              templateOptions: {
                  label: $translate.instant('FORMS.CUSTOMER.APELLIDOS'),
                  required: true
              }
          }, {
              key: 'email',
              type: 'input',
              templateOptions: {
                  type: "text",
                  label: $translate.instant('FORMS.CUSTOMER.EMAIL'),
                  required: true
              }
          }],
          password: [{
              key: 'password',
              type: 'input',
              templateOptions: {
                  label: $translate.instant('FORMS.USER.CONTRASENA'),
                  type: 'password'
              }
          }, {
              key: 'password_confirm',
              type: 'input',
              templateOptions: {
                  label: $translate.instant('FORMS.USER.CONFIRME_CONTRASENA'),
                  type: 'password'
              },
              validators: {
                  //confirm: confirmPasswordValidator
              }
          }],
          addresses: {
              key: 'addresses',
              type: 'repeatSection',
              templateOptions: {
                  btnText: $translate.instant('FORMS.CUSTOMER.AGREGAR_OTRA_DIRECCION'),
                  label: $translate.instant('FORMS.CUSTOMER.DIRECCION'),
                  required: true,
                  fields: [{
                      key: 'address',
                      type: 'address',
                      templateOptions: {
                          label: $translate.instant('FORMS.CUSTOMER.DIRECCION'),
                          required: true
                      }
                  }, {
                      key: 'observations',
                      type: 'textarea',
                      templateOptions: {
                          label: 'Observaciones'
                      }
                  }]
              }
          },
  
          phones: {
              key: 'phones',
              type: 'repeatSection',
              templateOptions: {
                  btnText: $translate.instant('FORMS.CUSTOMER.AGREGAR_OTRO_TELEFONO'),
                  label: $translate.instant('FORMS.CUSTOMER.TELEFONO'),
                  required: true,
                  fields: [{
                      key: 'type',
                      type: 'select',
                      id: 'phone-type',
                      templateOptions: {
                          label: $translate.instant('FORMS.CUSTOMER.TIPO'),
                          required: true,
                          options: NEXO.phonesTypes,
                          valueProp: 'slug'
                      }
                  }, {
                      key: 'phone',
                      type: 'input',
                      templateOptions: {
                          label: $translate.instant('FORMS.CUSTOMER.TELEFONO'),
                          required: true
                      }
                  }]
              }
          }
      };
      return fields;
  });


app.directive('starRating', function () {
    return {
        scope: {
            rating: '=',
            maxRating: '@',
            readOnly: '@',
            click: "&",
            mouseHover: "&",
            mouseLeave: "&"
        },
        restrict: 'EA',
        template:
            "<div style='display: inline-block; margin: 0px; padding: 0px; cursor:pointer;' ng-repeat='idx in maxRatings track by $index'> \
                    <img ng-src='{{((hoverValue + _rating) <= $index) && \"http://www.codeproject.com/script/ratings/images/star-empty-lg.png\" || \"http://www.codeproject.com/script/ratings/images/star-fill-lg.png\"}}' \
                    ng-Click='isolatedClick($index + 1)' \
                    ng-mouseenter='isolatedMouseHover($index + 1)' \
                    ng-mouseleave='isolatedMouseLeave($index + 1)'></img> \
            </div>",
        compile: function (element, attrs) {
            if (!attrs.maxRating || (Number(attrs.maxRating) <= 0)) {
                attrs.maxRating = '5';
            };
        },
        controller: function ($scope, $element, $attrs) {
            $scope.maxRatings = [];

            for (var i = 1; i <= $scope.maxRating; i++) {
                $scope.maxRatings.push({});
            };

            $scope._rating = $scope.rating;
      
      $scope.isolatedClick = function (param) {
        if ($scope.readOnly == 'true') return;

        $scope.rating = $scope._rating = param;
        $scope.hoverValue = 0;
        $scope.click({
          param: param
        });
      };

      $scope.isolatedMouseHover = function (param) {
        if ($scope.readOnly == 'true') return;

        $scope._rating = 0;
        $scope.hoverValue = param;
        $scope.mouseHover({
          param: param
        });
      };

      $scope.isolatedMouseLeave = function (param) {
        if ($scope.readOnly == 'true') return;

        $scope._rating = $scope.rating;
        $scope.hoverValue = 0;
        $scope.mouseLeave({
          param: param
        });
      };
        }
    };
});



app.run(function(amMoment) {
  amMoment.changeLocale(window.NEXO.lang);
});



/*app.filter('prettyJSON', function () {
    function prettyPrintJson(json) {
      console.log(json);
      return JSON ? JSON.stringify(json, null, '  ') : 'your browser doesnt support JSON so cant pretty print';
    }
    return prettyPrintJson;
});

app.filter('log', function () {
    function log(json) {
      console.log(json);      
    } 
});
*/




