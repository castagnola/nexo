<?php

namespace Nexo\Events;

use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ServiceWasAssigned extends Event
{
    use SerializesModels;

    public $service, $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($service, $user)
    {
        $this->service = $service;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user.' . $this->user->id];
    }
}
