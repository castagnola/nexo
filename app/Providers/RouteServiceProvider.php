<?php

namespace Nexo\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 * @package Nexo\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Nexo\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {

        $this->mapWebRoutes($router);
        $this->mapApiRoutes($router);
        $this->mapBindRoutes($router);

        /*
        $router->group(['namespace' => $this->namespace], function () {
            require app_path('Http/routes-api.php');
        });

        $router->group(['namespace' => $this->namespace], function () {
            require app_path('Http/routes-bind.php');
        });
        */
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace,
            'middleware' => 'web',
        ], function () {
            require app_path('Http/routes.php');
        });
    }

    /**
     * @param Router $router
     */
    protected function mapApiRoutes(Router $router)
    {
        $api = app('Dingo\Api\Routing\Router');

        $api->version('v1', function ($api) {
            $api->group([
                'namespace' => 'Nexo\Http\Controllers\Api',
                'middleware' => 'lang'
            ], function () {
                require app_path('Http/routes-api.php');
            });
        });
    }

    protected function mapBindRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function () {
            require app_path('Http/routes-bind.php');
        });
    }

}
