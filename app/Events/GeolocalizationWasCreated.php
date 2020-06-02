<?php

namespace Nexo\Events;

use Illuminate\Database\Eloquent\Model;
use Nexo\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GeolocalizationWasCreated extends Event implements ShouldBroadcast
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
        $channels = [];

        foreach ($this->model->user->services as $service) {
            $channels[] = "service.{$service->id}";
        }

        foreach ($this->model->user->teams as $team) {
            $channels[] = "team.{$team->id}";
        }



        return $channels;
    }

    public function broadcastWith()
    {
        return [
            'user_id' => $this->model->user_id,
            'latitude' => $this->model->latitude,
            'longitude' => $this->model->longitude,
            'created_at' => $this->model->created_at
        ];
    }

    public function broadcastAs()
    {
        return 'localization-created';
    }
}
