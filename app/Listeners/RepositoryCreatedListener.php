<?php

namespace Nexo\Listeners;


use Nexo\Entities\Notification;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceAssignment;
use Nexo\Events\AssignmentWasCreated;
use Nexo\Events\GeolocalizationWasCreated;
use Nexo\Events\NotificationWasCreated;
use Nexo\Events\ServiceWasCreated;
use Nexo\Events\TeamServicesWasUpdated;
use Nexo\Repositories\ServiceAssignmentRepository;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Nexo\Entities\UserGeolocalization;

class RepositoryCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityCreated $event
     * @return void
     *
     */
    public function handle(RepositoryEntityCreated $event)
    {
        $model = $event->getModel();
        $modelName = get_class($model);

        if ($modelName == UserGeolocalization::class) {
            event(new GeolocalizationWasCreated($model));
        }

        if ($modelName == Notification::class) {
            event(new NotificationWasCreated($model));
        }

        if ($modelName == Service::class) {
            event(new ServiceWasCreated($model));
            event(new TeamServicesWasUpdated($model->team));
        }

        if ($modelName == ServiceAssignment::class) {
            event(new AssignmentWasCreated($model));
        }

    }
}
