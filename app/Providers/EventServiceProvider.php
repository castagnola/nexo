<?php

namespace Nexo\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Prettus\Repository\Events\RepositoryEntityCreated' => [
            'Nexo\Listeners\RepositoryCreatedListener',
        ],
        /*
        'Prettus\Repository\Events\RepositoryEntityUpdated' => [
            'Nexo\Listeners\RepositoryUpdatedListener',
        ],

        'Nexo\Events\ServiceWasAccepted' => [
            'Nexo\Listeners\NotificationServiceAccepted',
        ],

        'Nexo\Events\ServiceWasStatusUpdated' => [
            'Nexo\Listeners\MobileNotificationServiceStatusUpdated',
        ],

        'Nexo\Events\AssignmentWasCreated' => [
            'Nexo\Listeners\Mobile\NewAssign',
        ],
        'Nexo\Events\ServiceWasAssigned' => [
            'Nexo\Listeners\Mobile\NewService',
        ],
        //
        'Nexo\Events\ServiceWasStarted' => [
            'Nexo\Listeners\Mobile\ServiceStarted',
        ],
        'Nexo\Events\ServiceWasArrived' => [
            'Nexo\Listeners\Mobile\ServiceArrived',
        ],
        'Nexo\Events\UserWasUpdateItinerary' => [
            'Nexo\Listeners\UpdateUserItinerary',
        ],
        */

        'Nexo\Events\TeamServicesWasUpdated' => [
            'Nexo\Listeners\UpdateTeamCounters',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'Nexo\Listeners\UserEventListener',
        'Nexo\Listeners\ServiceEventListener',
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
