<?php

namespace Nexo\Events;

use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AssignmentWasCreated extends Event
{
    use SerializesModels;

    public $model;
    public $service;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
        $this->service = $model->service;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
