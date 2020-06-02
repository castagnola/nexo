<?php

namespace Nexo\Events;

use Nexo\Entities\Service;
use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Nexo\Entities\User;

class ServiceWasAccepted extends Event
{
    use SerializesModels;

    public $service, $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Service $service, $user)
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
        return ['user.' . $this->service->created_by];
    }
}
