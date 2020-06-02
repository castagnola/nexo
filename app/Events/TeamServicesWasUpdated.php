<?php

namespace Nexo\Events;

use Nexo\Entities\Team;
use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;

class TeamServicesWasUpdated extends Event
{
    use SerializesModels;

    public $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
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
