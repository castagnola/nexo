<?php

$api = app('Dingo\Api\Routing\Router');


$api->controllers([
    'auth' => 'AuthController',
]);

$api->group(['middleware' => 'api.auth'], function ($api) {

    $api->resource('modules', 'ModulesController');

    $api->resource('cities', 'CitiesController');
    $api->resource('products', 'ProductsController');
    $api->resource('tools', 'ToolsController');
    $api->resource('products-categories', 'ProductsCategoriesController');
    $api->resource('polls', 'PollsController');
    $api->resource('polls-answers', 'PollsAnswersController');
    //$api->resource('polls-answer-options', 'PollsAnswerOptionsController');
    $api->resource('roles', 'RolesController');
    $api->resource('transports', 'TransportsController');

    // services
    $api->resource('services-types', 'ServicesTypesController');
    $api->resource('services-statuses', 'ServicesStatusesController');

    $api->resource('langs', 'LangsController'); 

    // teams
    $api->get('teams/{teams}/users-localizations', 'TeamsController@usersLocalizations');
    $api->post('teams/{teams}/quick-stats', 'TeamsController@quickStats');
    $api->get('teams/{teams}/roles-limits', 'TeamsController@rolesLimits');
    $api->resource('teams', 'TeamsController');

    // assignments
    $api->post('assignments/calculate-recurrence', 'AssignmentsController@calculateRecurrence');
    $api->resource('assignments', 'AssignmentsController');


    // import
    $api->group(['prefix' => 'import', 'namespace' => 'Import'], function ($api) {
        $api->post('customers/init', 'CustomersController@init');
        $api->post('customers/finish', 'CustomersController@finish');
        $api->post('products-categories/init', 'ProductsCategoriesController@init');
        $api->post('products-categories/finish', 'ProductsCategoriesController@finish');
        $api->post('products/init', 'ProductsController@init');
        $api->post('products/finish', 'ProductsController@finish');
        $api->post('services-types/init', 'ServicesTypesController@init');
        $api->post('services-types/finish', 'ServicesTypesController@finish');
    });

    // stats
    $api->group(['prefix' => 'stats'], function ($api) {
        $api->post('services-by-status', 'StatsController@servicesByStatus');
        $api->post('services-by-users', 'StatsController@servicesByUsers');
        $api->post('polls', 'StatsController@polls');
    });

    // customers
    // Fix customer address
    $api->post('customers/{customers}/addresses/{customersAddresses}/fix', 'CustomersAddressesController@fix');
    $api->post('customers/{customers}/addresses/{customersAddresses}/search', 'CustomersAddressesController@search');
    $api->resource('customers.services', 'CustomersServicesController');
    $api->resource('customers', 'CustomersController');
    $api->resource('customers.addresses', 'CustomersAddressesController', [
        'parameters' => [
            'addresses' => 'customersAddresses'
        ]
    ]);

    $api->post('tools/search', 'ToolsController@search');


    // langs
    $api->get('langs/{lang}/json', 'LangsController@json');


    // users
    $api->post('users/change-lang', 'UsersController@changeLang');
    $api->resource('users', 'UsersController');
    $api->resource('users.services', 'UsersServicesController');
    $api->resource('users.geolocalizations', 'UsersGeolocalizationsController');
    $api->resource('users-locations', 'UsersController@locations');
    $api->resource('users.assignments', 'UsersAssignmentsController');
});


/*
$teamRoutes = function ($api) {
  $api->post('customers/init-import', 'Nexo\Http\Controllers\Api\CustomersController@initImport');
  $api->post('customers/finish-import', 'Nexo\Http\Controllers\Api\CustomersController@finishImport');
  $api->resource('customers', 'Nexo\Http\Controllers\Api\CustomersController');

  $api->get('users/channel', 'Nexo\Http\Controllers\Api\Team\UsersController@channel');
  $api->get('users/locations', 'Nexo\Http\Controllers\Api\Team\UsersController@locations');
  $api->post('users/busy', 'Nexo\Http\Controllers\Api\Team\UsersController@busy');
  $api->resource('users', 'Nexo\Http\Controllers\Api\Team\UsersController');


  $api->resource('services', 'Nexo\Http\Controllers\Api\Team\ServicesController');
  $api->resource('services-types', 'Nexo\Http\Controllers\Api\Team\ServicesTypesController');
  $api->resource('cities', 'Nexo\Http\Controllers\Api\Team\LocationsCitiesController');
  $api->resource('events', 'Nexo\Http\Controllers\Api\Team\EventsController');
  $api->resource('users.events', 'Nexo\Http\Controllers\Api\Team\UsersEventsController');

  $api->resource('roles', 'Nexo\Http\Controllers\Api\Team\RolesController');


  $api->get('stats/services', 'Nexo\Http\Controllers\Api\Team\StatsController@services');
  $api->get('stats/users', 'Nexo\Http\Controllers\Api\Team\StatsController@users');


};


$api->version('v1', ['domain' => env('TEAM_DOMAIN', '{teamSlug}.nexo.dev.192.168.0.11.xip.io')], $teamRoutes);


$api->version('v1', function ($api) {
  $api->resource('teams', 'TeamsController');


  $api->resource('events', 'Nexo\Http\Controllers\Api\EventsController');

  $api->resource('roles', 'Nexo\Http\Controllers\Api\RolesController');
  $api->resource('modules', 'Nexo\Http\Controllers\Api\ModulesController');

  $api->get('users/channel', 'Nexo\Http\Controllers\Api\UsersController@channel');
  $api->get('users/app-status', 'Nexo\Http\Controllers\Api\UsersController@appStatus');

  $api->post('users/{users}/services/{services}/finish', 'Nexo\Http\Controllers\Api\UsersServicesController@finish');

  $api->resource('users', 'Nexo\Http\Controllers\Api\UsersController');
  $api->resource('users.devices', 'Nexo\Http\Controllers\Api\UsersDevicesController');

  // Finish
  $api->post('assignments/{assignments}/accept', 'Nexo\Http\Controllers\Api\AssignmentsController@accept');
  $api->post('assignments/{assignments}/decline', 'Nexo\Http\Controllers\Api\AssignmentsController@decline');
  $api->resource('assignments', 'Nexo\Http\Controllers\Api\AssignmentsController');


  $api->resource('users.services', 'Nexo\Http\Controllers\Api\UsersServicesController');

  $api->resource('users.assignments', 'Nexo\Http\Controllers\Api\UsersAssignmentsController');
  

  $api->resource('customers', 'Nexo\Http\Controllers\Api\CustomersController');
  $api->resource('customers.addresses', 'Nexo\Http\Controllers\Api\CustomersAddressesController');
  $api->resource('customers.services', 'Nexo\Http\Controllers\Api\CustomersServicesController');
  $api->resource('customers.devices', 'Nexo\Http\Controllers\Api\CustomersDevicesController');
  $api->resource('customers.answers', 'Nexo\Http\Controllers\Api\CustomersAnswersController');

  $api->resource('services-statuses', 'Nexo\Http\Controllers\Api\ServicesStatusesController');
  $api->resource('services-types', 'Nexo\Http\Controllers\Api\ServicesTypesController');
  $api->resource('services-types.fields', 'Nexo\Http\Controllers\Api\ServicesTypesFieldsController');
  $api->resource('services-types.items', 'Nexo\Http\Controllers\Api\ServicesTypesItemsController');

  $api->resource('notifications', 'Nexo\Http\Controllers\Api\NotificationsController');
  $api->resource('transports', 'Nexo\Http\Controllers\Api\TransportsController');

  $api->get('teams/{teams}/polls/current', 'Nexo\Http\Controllers\Api\TeamsPollsController@getCurrent');
  // Puede crear el team?
  $api->post('teams/{teams}/can-create-service', 'Nexo\Http\Controllers\Api\TeamsController@canCreateService');
  $api->post('teams/{teams}/can-create-product', 'Nexo\Http\Controllers\Api\TeamsController@canCreateProduct');
  //

  $api->resource('teams.polls', 'Nexo\Http\Controllers\Api\TeamsPollsController');

  // Services
  $api->post('services/{services}/start', 'Nexo\Http\Controllers\Api\ServicesController@start');
  $api->post('services/{services}/arrived', 'Nexo\Http\Controllers\Api\ServicesController@arrived');
  $api->post('services/{services}/finish', 'Nexo\Http\Controllers\Api\ServicesController@finish');
  $api->post('services/{services}/finish-with-survey', 'Nexo\Http\Controllers\Api\ServicesController@finishWithSurvey');
  $api->post('services/{services}/duration', 'Nexo\Http\Controllers\Api\ServicesController@getDuration');
  $api->get('services/{services}/find-location', 'Nexo\Http\Controllers\Api\ServicesController@findLocation');
  $api->get('services/{services}/survey', 'Nexo\Http\Controllers\Api\ServicesController@getSurvey');

  $api->resource('services', 'Nexo\Http\Controllers\Api\ServicesController');
  $api->resource('services.novelties', 'Nexo\Http\Controllers\Api\ServicesNoveltiesController');
  $api->resource('services.locations', 'Nexo\Http\Controllers\Api\ServicesLocationsController');


  $api->resource('products-categories', 'Nexo\Http\Controllers\Api\ProductsCategoriesController');
  $api->resource('products', 'Nexo\Http\Controllers\Api\ProductsController');


  // Rutas
  $api->post('routes/{services}/{users}', 'Nexo\Http\Controllers\Api\RoutesController@calculate');

});
  */