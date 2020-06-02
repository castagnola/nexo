<?php

namespace Nexo\Listeners\Mobile;

use Nexo\Contracts\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAssign implements ShouldQueue
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
        $model = $event->model;
        $service = $event->service;
        $user = $model->user;


        $this->push->send([
            'title' => 'Tienes una nueva preasignación',
            'alert' => "Te han preasignado el servicio #{$service->code} - {$service->type->name}.",
            'users' => [$user->id]
        ], [
            'event' => 'new-assignment',
            'id' => $model->id
        ]);

    }
}