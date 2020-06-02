<?php

namespace Nexo\Listeners\Mobile;

use Nexo\Contracts\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewService implements ShouldQueue
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
        $service = $event->service;
        $user = $event->user;


        $this->push->send([
            'title' => 'Tienes un nuevo servicio por hacer',
            'alert' => "Te han asignado el servicio #{$service->code} - {$service->type->name}.",
            'users' => [$user->id]
        ], [
            'event' => 'new-service',
            'id' => $service->id
        ]);

        $customer = $service->customer->user;

        $this->push->send([
            'title' => 'Servicio creado',
            'alert' => "El servicio #{$service->code} - {$service->type->name} se ha añadido a tu lista de servicios pendientes.",
            'users' => [$customer->id]
        ], [
            'event' => 'customer-new-service',
            'id' => $service->id
        ]);

    }
}