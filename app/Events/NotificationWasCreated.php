<?php

namespace Nexo\Events;

use Illuminate\Database\Eloquent\Model;
use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationWasCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;

    protected $model;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [
            'user.' . $this->model->user_id
        ];
    }

    public function broadcastAs()
    {
        return ['notification-created'];
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->model->id,
        ];
    }
}
