<?php

namespace Nexo\Events;

use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class ServiceWasCreated
 * @package Nexo\Events
 */
class ServiceWasCreated extends Event
{
    use SerializesModels;


    /**
     * @var
     */
    public $model;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($model)
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
        return [];
    }
}
