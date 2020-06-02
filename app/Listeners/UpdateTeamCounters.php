<?php

namespace Nexo\Listeners;

use Carbon\Carbon;
use Nexo\Events\TeamServicesWasUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Firebase;
use Nexo\Repositories\ServiceStatusRepository;

class UpdateTeamCounters
{
    public $serviceStatusRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ServiceStatusRepository $serviceStatusRepository)
    {
        $this->serviceStatusRepository = $serviceStatusRepository;
    }

    /**
     * Handle the event.
     *
     * @param  TeamServicesWasUpdated $event
     * @return void
     */
    public function handle(TeamServicesWasUpdated $event)
    {
        return true;

        $team = $event->team;
        $statuses = $this->serviceStatusRepository->all();

        $servicesForTodayCounter = [];
        $servicesForToday = $team->services->filter(function ($service) {
            return $service->created_at->isToday();
        });


        $statuses->map(function ($status) use (&$servicesForTodayCounter, $servicesForToday) {
            $slug = str_replace('-', '_', $status->slug);
            return $servicesForTodayCounter[$slug] = $servicesForToday->where('service_status_id', $status->id)->count();
        });

        $data = [
            'services' => $servicesForTodayCounter
        ];


        Firebase::set("teams/{$team->hashId}/counters", $data);
    }
}
