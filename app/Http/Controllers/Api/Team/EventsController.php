<?php

namespace Nexo\Http\Controllers\Api\Team;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;

use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceAssignmentRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\EventTransformer;
use Nexo\Transformers\UserTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

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
    public function index(Team $team)
    {
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


        /*
                $faker = Factory::create();
                $users = User::onlyRuteros()->whereHas('teams', function ($query) use ($team) {
                    return $query->where('id', $team->id);
                })->get();
                $usersIds = $users->lists('id')->toArray();
                $statuses = [
                    'en-espera',
                    'en-ejecucion',
                    'realizado',
                    'realizado-y-calificado'
                ];

                $durations = [5, 15, 30, 60];

                for ($i = 0; $i < 100; $i++) {


                    $start = $faker->dateTimeBetween('-3 hours', '+3 hours');
                    $end = clone $start;
                    $duration = $faker->randomElement($durations);
                    $end->modify("+{$duration} minutes");

                    $events->push([
                        'id' => $i + 1,
                        'code' => $faker->md5,
                        'start' => $start->format('Y-m-d H:i:s'),
                        'end' => $end->format('Y-m-d H:i:s'),
                        'title' => $faker->word,
                        'user_id' => $faker->randomElement($usersIds),
                        'start_unix' => $start->format('U'),
                        'end_unix' => $end->format('U'),
                        'status' => $faker->randomElement($statuses)
                    ]);

                }

        */


        $eventsToReturn = array_values($events->sortBy('start_unix')->toArray());


        return $this->response->array($eventsToReturn);
    }
}
