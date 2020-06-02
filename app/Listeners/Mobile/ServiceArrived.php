<?php

namespace Nexo\Listeners\Mobile;

use Nexo\Contracts\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceArrived implements ShouldQueue
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
            'title' => "El rutero ha llegado.",
            'alert' => "Todo está listo para que ejecuten tu servicio #{$service->code}.",
            'users' => [$user->id]
        ], [
            'event' => 'service-arrived',
            'id' => $service->id
        ]);

    }
}