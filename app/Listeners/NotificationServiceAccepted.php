<?php

namespace Nexo\Listeners;

use Nexo\Entities\Notification;
use Nexo\Events\ServiceWasAccepted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationServiceAccepted
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
     * @param  ServiceWasUpdated $event
     * @return void
     */
    public function handle(ServiceWasAccepted $event)
    {
        $service = $event->service;

        // Enviando notificación al despachador

        $service->notifications()->save(new Notification([
            'created_by' => $event->user->id,
            'user_id' => $service->created_by,
            'type' => 'service-accepted'
        ]));
    }
}
