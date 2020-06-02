<?php

namespace Nexo\Listeners;

use anlutro\cURL\cURL;
use Dmitrovskiy\IonicPush\PushProcessor;
use Nexo\Contracts\PushNotification;
use Nexo\Entities\Notification;
use Nexo\Events\AssignmentWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MobileNotificationNewAssignment implements ShouldQueue
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

    /**
     * @param AssignmentWasCreated $event
     */
    public function handle(AssignmentWasCreated $event)
    {
        $model = $event->model;


        $this->push->send([
            'title' => 'Nuevo servicio preasignado',
            'alert' => 'Hay un nuevo servicio que puedes aceptar o declinar.',
            'users' => [$model->user->id]
        ], [
            'type' => 'new-service-assign',
            'route' => [
                'name' => 'userAssignment',
                'params' => [
                    'assignmentId' => $model->id
                ]
            ],
            'events' => ['load:assignments']
        ]);

    }
}
