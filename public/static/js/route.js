/* route */

app.config(function($routeProvider,$locationProvider) {

  
	$routeProvider
  	.when("/customer", {
  		controller : "CustomerCtrl",
        templateUrl : window.NEXO.template_url+"dashboard"
    })
    .when("/asignaciones/:param1", {
  		controller : "AssignmentCtrl",
      templateUrl : window.NEXO.template_url+"assignment/detail"
    })
    .when("/encuestas/:param1/:param2", {
      controller : "PollCtrl",
      templateUrl : window.NEXO.template_url+"poll/detail"
    })
    .when("/clientes/:param1/editar", {
      controller : "UserCtrl",
      templateUrl : window.NEXO.template_url+"client/detail"
    })
    .when("/historial", {
      controller : "HistoryCtrl",
        templateUrl : window.NEXO.template_url+"history/list"
    })
    .otherwise({ redirectTo: '/customer' });

    console.log('route');

    //$locationProvider.html5Mode(true);
 });



