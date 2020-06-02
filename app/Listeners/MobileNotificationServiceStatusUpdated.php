<?php

namespace Nexo\Listeners;

use Dmitrovskiy\IonicPush\PushProcessor;
use Nexo\Contracts\PushNotification;
use Nexo\Events\ServiceWasStatusUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MobileNotificationServiceStatusUpdated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(PushNotification $push)
    {
        $this->push = $push;
    }

    /**
     * Handle the event.
     *
     * @param  ServiceWasStatusUpdated $event
     * @return void
     */
    public function handle(ServiceWasStatusUpdated $event)
    {
        $model = $event->model;
        $users = $model->users->lists('id')->toArray();

        if (!empty($users)) {
            $this->push->send([
                'title' => 'Servicio actualizado',
                'alert' => "El servicio #{$model->code} ha sido actualizado a {$model->status->name}",
                'users' => $users
            ], [
                'type' => 'service-status-changed',
                'route' => [
                    'name' => 'userService',
                    'params' => [
                        'serviceId' => $model->id
                    ]
                ]
            ]);
        }
    }
}
