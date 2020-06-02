<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceAssignmentRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\EventTransformer;


class EventsController extends Controller
{
    use ApiResponse;

    protected $serviceRepository;
    protected $serviceAssignmentRepository;
    protected $transformer;

    public function __construct(ServiceRepository $serviceRepository, ServiceAssignmentRepository $serviceAssignmentRepository, EventTransformer $transformer)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceAssignmentRepository = $serviceAssignmentRepository;
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $team = Team::findOrFail($teamId);

        $events = collect([]);
        $allServices = $this->serviceRepository->findByField('team_id', $team->id);

        foreach ($allServices as $service) {
            foreach ($service->users as $user) {
                $temp = [
                    'id' => $service->id,
                    'code' => $service->code,
                    'start' => $service->start_at->toDateTimeString(),
                    'end' => $service->end_at->toDateTimeString(),
                    'title' => $service->type->name,
                    'user_id' => $user->id,
                    'start_unix' => $service->start_at->timestamp,
                    'end_unix' => $service->end_at->timestamp,
                    'status' => $service->status->slug
                ];

                $events->push($temp);
            }
        }

        $assignments = $this->serviceAssignmentRepository->all()->map(function ($assignment) {
            $service = $assignment->service;
            return [
                'id' => $assignment->id,
                'code' => $service->code,
                'start' => $service->start_at->toDateTimeString(),
                'end' => $service->end_at->toDateTimeString(),
                'title' => $service->type->name,
                'user_id' => $assignment->user_id,
                'start_unix' => $service->start_at->timestamp,
                'end_unix' => $service->end_at->timestamp,
                'status' => $service->status->slug
            ];
        });

        $events = $events->merge($assignments);


        $eventsToReturn = array_values($events->sortBy('start_unix')->toArray());


        return $this->response->array($eventsToReturn);
    }
}
