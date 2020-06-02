<?php

namespace Nexo\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        'Barryvdh\Cors\HandleCors',
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Nexo\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Nexo\Http\Middleware\VerifyCsrfToken::class
        ],
        'lang' => [
            \Nexo\Http\Middleware\App::class,
        ],
        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Nexo\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \Nexo\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'team' => \Nexo\Http\Middleware\TeamMiddleware::class,
        'sentinel.team.auth' => \Nexo\Http\Middleware\SentinelTeamAuth::class,
        'sentinel.auth' => \Nexo\Http\Middleware\SentinelAuth::class,
        'sentinel.guest' => \Nexo\Http\Middleware\SentinelGuest::class,
        'sentinel.role' => \Nexo\Http\Middleware\SentinelRole::class,
        'has.access' => \Nexo\Http\Middleware\HasAccess::class,
    ];
}
