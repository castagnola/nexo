<?php



Route::auth();

Route::controller('test', 'TestController');  
Route::controller('password','PasswordController');
Route::controller('customer','CustomerController'); 
Route::controller('auth','Auth\AuthController');
Route::get('/', 'HomeController@index');
Route::get('/language/{lang}', 'HomeController@language');
Route::get('{teamSlug}', 'HomeController@team');


Route::controllers([
    'ui' => 'UIController',
    'profile' => 'ProfileController'
]);

Route::group(['prefix' => '{teamSlug}'], function ($route) {
    $route->group(['prefix' => 'export'], function ($route) {
        $route->group(['prefix' => 'guides'], function ($route) {
            $route->get('products-categories', 'ExportController@productsCategoriesGuide');
            $route->get('products-categories-export', 'ExportController@productsCategoriesExport');
            $route->get('products', 'ExportController@productsGuide');
            $route->get('services', 'ExportController@servicesGuide');
        });
    });
});



/*

Route::group(['prefix' => '{teamSlug}'], function () {

    Route::group(['middleware' => 'sentinel.team.auth'], function () {
        Route::get('/', ['uses' => 'TeamController@index', 'as' => 'team']);

        Route::post('users/{users}/change-status', [
            'as' => 'users.change-status',
            'uses' => 'TeamUsersController@changeStatus'
        ]);

        // Team general configuration
        Route::get('configuration', ['as' => 'configuration', 'uses' => 'TeamController@getConfiguration']);
        Route::post('configuration', ['as' => 'configuration.save', 'uses' => 'TeamController@postConfiguration']);

        Route::get('stats', ['as' => 'stats', 'uses' => 'TeamStatsController@index']);

        Route::controller('profile', 'TeamProfileController');
    });


    Route::get('ui/template', 'UIController@clientTemplate');
});

/*


Route::get('home', ['middleware' => 'sentinel.auth'], function () {
    return redirect('/');
});

Route::group(['middleware' => ['sentinel.auth']], function () {
    Route::get('/', 'DashboardController@index');
});


Route::group(['middleware' => 'sentinel.auth'], function () {
    Route::group(['middleware' => 'sentinel.role:admin'], function () {
        Route::resource('users', 'UsersController');
        Route::post('users/{id}/change-status', [
            'as' => 'users.change-status',
            'uses' => 'UsersController@changeStatus'
        ]);
        Route::post('teams/{id}/change-status', [
            'as' => 'teams.change-status',
            'uses' => 'TeamsController@changeStatus'
        ]);
        Route::resource('teams', 'TeamsController');
        Route::resource('teams.users', 'TeamsUsersController');
    });


});


*/

