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

/**
 * Class UsersEventsController
 * @package Nexo\Http\Controllers\Api\Team
 */
class UsersEventsController extends Controller
{
    use ApiResponse;

    /**
     * @var ServiceRepository
     */
    protected $serviceRepository;
    /**
     * @var ServiceAssignmentRepository
     */
    protected $serviceAssignmentRepository;
    /**
     * @var EventTransformer
     */
    protected $transformer;

    /**
     * @param ServiceRepository $serviceRepository
     * @param ServiceAssignmentRepository $serviceAssignmentRepository
     * @param EventTransformer $transformer
     */
    public function __construct(ServiceRepository $serviceRepository, ServiceAssignmentRepository $serviceAssignmentRepository, EventTransformer $transformer)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceAssignmentRepository = $serviceAssignmentRepository;
        $this->transformer = $transformer;
    }


    /**
     * @param Team $team
     * @param User $user
     * @return mixed
     */
    public function index(Team $team, User $user)
    {
        $events = collect([]);

        $services = $this->serviceRepository->scopeQuery(function ($query) use ($team, $user) {
            return $query->where('team_id', $team->id)->whereHas('users', function ($query) use ($user) {
                return $query->where('id', $user->id);
            });
        })->all()->map(function ($service) {
            return [
                'id' => 'service' . $service->id,
                'code' => $service->code,
                'start' => $service->start_at->toDateTimeString(),
                'end' => $service->end_at->toDateTimeString(),
                'title' => $service->type->name,
                'user_id' => $service->user_id,
                'start_unix' => (int)$service->start_at->timestamp,
                'end_unix' => (int)$service->end_at->timestamp,
                'status' => $service->status->slug
            ];
        });

        $assignments = $this->serviceAssignmentRepository->findByField('user_id', $user->id)->map(function ($assignment) {
            $service = $assignment->service;
            return [
                'id' => 'assignment' . $assignment->id,
                'code' => $service->code,
                'start' => $service->start_at->toDateTimeString(),
                'end' => $service->end_at->toDateTimeString(),
                'title' => $service->type->name,
                'user_id' => $assignment->user_id,
                'start_unix' => (int)$service->start_at->timestamp,
                'end_unix' => (int)$service->end_at->timestamp,
                'status' => 'en-espera'
            ];
        });

        $events = $events->merge($services)->merge($assignments);


        /*$faker = Factory::create();

        $statuses = [
            'en-espera',
            'en-ejecucion',
            'realizado',
            'realizado-y-calificado',
            'por-ejecutar'
        ];

        $durations = [5, 15, 30, 60];

        for ($i = 0; $i < 100; $i++) {

            $start = $faker->dateTimeBetween('-3 days', '+3 days');
            $end = clone $start;
            $duration = $faker->randomElement($durations);
            $end->modify("+{$duration} minutes");

            $events->push([
                'id' => $i + 1,
                'code' => $faker->md5,
                'start' => $start->format('Y-m-d H:i:s'),
                'end' => $end->format('Y-m-d H:i:s'),
                'title' => $faker->word,
                'user_id' => $user->id,
                'start_unix' => $start->format('U'),
                'end_unix' => $end->format('U'),
                'status' => $faker->randomElement($statuses)
            ]);

        }*/

        $eventsToReturn = array_values($events->sortBy('start_unix')->toArray());


        return $this->response->array($eventsToReturn);
    }
}


/*
code: "132000"
end: "2015-11-04 20:04:58"
end_unix: 1446685498
id: 117
start: "2015-11-04 19:34:58"
start_unix: 1446683698
status: "vencido"
title: "limpieza"
user_id: 62
 */

/*
code: "e6aaed89693158350dec2c0f6a24d9ac"
end: "2015-11-08 07:17:45"
end_unix: "1446985065"
id: 75
start: "2015-11-08 06:47:45"
start_unix: "1446983265"
status: "en-espera"
title: "perferendis"
user_id: 62
 */