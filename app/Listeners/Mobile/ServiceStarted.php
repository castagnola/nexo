<?php

namespace Nexo\Listeners\Mobile;

use Nexo\Contracts\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceStarted implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PushNotification $pushNotification)
    {
        $this->push = $pushNotification;
    }


    public function handle($event)
    {
        $service = $event->model;

        $user = $service->customer->user;


        $this->push->send([
            'title' => "¡El rutero va en camino!",
            'alert' => "Ya puedes estar pendiente de la ubicación del rutero al servicio #{$service->code}",
            'users' => [$user->id]
        ], [
            'event' => 'service-started',
            'id' => $service->id
        ]);

    }
}