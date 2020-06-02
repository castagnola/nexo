<?php

namespace Nexo\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Nexo\Entities\PollOption;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceStatus;
use Nexo\Entities\UserItinerary;
use Nexo\Events\ServiceWasArrived;
use Nexo\Events\ServiceWasStarted;
use Nexo\Events\ServiceWasStatusUpdated;
use Nexo\Events\UserWasUpdateItinerary;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\PollAnswerOptionRepository;
use Nexo\Repositories\PollAnswerRepository;
use Nexo\Repositories\PollRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\PollTransformer;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Transformers\UserItineraryTransformer;
use Nexo\Entities\User;

/**
 * Class ServicesController
 * @package Nexo\Http\Controllers\Api
 */
class ServicesController extends Controller
{
    use ApiResponse;

    /**
     * @var ServiceRepository
     */
    /**
     * @var ServiceRepository|ServiceTransformer
     */
    protected $repository, $pollRepository, $transformer;

    /**
     * @param ServiceRepository $repository
     * @param ServiceTransformer $transformer
     */
    public function __construct(ServiceRepository $repository, ServiceTransformer $transformer, PollRepository $pollRepository)
    {
        $this->repository = $repository;
        $this->pollRepository = $pollRepository;
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

        $repository = $this->repository->scopeQuery(function ($query) use ($teamId) {
            $return = $query->where('team_id', $teamId);

            return $return;
        });

        return $this->collection($request, $repository);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Service $service)
    {
        return $this->response->item($service, $this->transformer);
    }

    /**
     * @param Service $service
     * @return mixed
     */
    public function start(Service $service)
    {
        $status = ServiceStatus::where('slug', 'en-ruta')->firstOrFail();

        if ($service->service_status_id === $status->id) {
            return $this->response->errorBadRequest('El servicio ya se encuentra iniciado.');
        }

        $model = $this->repository->update([
            'service_status_id' => $status->id
        ], $service->id);

        if ($model) {
            event(new ServiceWasStarted($service));
            // Actualizar itinerario de los usuarios
            foreach ($service->users as $user) {
                event(new UserWasUpdateItinerary($user));
            }
            return $this->response->noContent();
        }

        return $this->response->errorBadRequest('Hubo un error iniciando el servicio.');
    }

    /**
     * @param Service $service
     * @return mixed
     */
    public function arrived(Service $service)
    {
        $status = ServiceStatus::where('slug', 'en-ejecucion')->firstOrFail();

        if ($service->service_status_id === $status->id) {
            return $this->response->errorBadRequest('El servicio ya se encuentra en ejecución.');
        }

        $model = $this->repository->update([
            'service_status_id' => $status->id
        ], $service->id);

        if ($model) {
            event(new ServiceWasArrived($service));
            return $this->response->noContent();
        }


        return $this->response->errorBadRequest('Hubo un error ejecutando la acción.');
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function finish(Request $request, Service $service)
    {
        $code = strtoupper($request->get('code'));
        $observations = $request->get('observation');

        if ($service->verification_code != $code) {
            return $this->response->errorBadRequest('El código de verificación es incorrecto.');
        }

        $status = ServiceStatus::where('slug', 'realizado')->firstOrFail();

        if ($service->status->slug == 'realizado-y-calificado') {
            $status = $service->status;
        }

        $payloadForService['service_status_id'] = $status->id;

        $model = $this->repository->update($payloadForService, $service->id);

        foreach ($service->users as $user) {
            event(new UserWasUpdateItinerary($user));
        }


        return $this->response->item($model, $this->transformer);
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return mixed
     */
    public function finishWithSurvey(Request $request, Service $service)
    {
        $pollId = $request->get('poll_id');
        $customerId = $request->get('customer_id');

        if (!empty($pollId)) {
            $answers = $request->get('answers');

            $answerRepository = app(PollAnswerRepository::class);

            $newAnswer = $answerRepository->create([
                'poll_id' => $pollId,
                'customer_id' => $service->customer_id
            ]);

            $answerOptionsRepository = app(PollAnswerOptionRepository::class);

            foreach ($answers as $answer) {
                $data = [
                    'poll_answer_id' => $newAnswer->id,
                    'poll_question_id' => $answer['question_id']
                ];

                $possibleOption = PollOption::find($answer['answer']);

                if (!empty($possibleOption)) {
                    $data['poll_option_id'] = $possibleOption->id;
                } else {
                    $data['answer'] = $answer['answer'];
                }

                $answerOptionsRepository->create($data);
            }
        }

        $status = ServiceStatus::where('slug', 'realizado-y-calificado')->first();

        $this->repository->update([
            'rating' => $request->get('rating'),
            'service_status_id' => $status->id
        ], $service->id);

        return $this->response->noContent();
    }


    /**
     * @param Service $service
     * @return mixed
     */
    public function findLocation(Service $service)
    {
        $locations = $service->users->map(function ($user) {
            return $user->geolocalizations->last();
        });

        return $this->response->array([
            'locations' => $locations
        ]);
    }

    /**
     * @param Service $service
     * @return mixed
     */
    public function getDuration(Service $service)
    {
        $user = $service->users->first();

        // Calculando el itinerario del día
        $user->getDayItinerary(true);

        $itinerary = $user->itineraries()->where('date', $service->start_at->toDateString())->first();

        if (empty($itinerary)) {
            return $this->response->errorNotFound();
        }

        $itineraryData = collect(json_decode($itinerary->itinerary));

        $serviceItinerary = $itineraryData->where('service_id', $service->id)->first();

        if (empty($serviceItinerary)) {
            $user->getDayItinerary(true);

            $itinerary = $user->itineraries()->where('date', $service->start_at->toDateString())->first();

            if (empty($itinerary)) {
                return $this->response->errorNotFound();
            }

            $itineraryData = collect(json_decode($itinerary->itinerary));

            $serviceItinerary = $itineraryData->where('service_id', $service->id)->first();
        }

        $nextQuery = $itinerary->next_query;

        $nextQuerySeconds = Carbon::now()->diffInSeconds($nextQuery);

        return $this->response->array([
            'data' => $serviceItinerary,
            'next_query' => $nextQuery,
            'next_query_seconds' => $nextQuerySeconds,
        ]);
    }


    /**
     * @param Service $service
     * @return mixed
     */
    public function getSurvey(Service $service)
    {
        $items = $this->pollRepository->findWhere([
            'team_id' => $service->team_id,
            'is_active' => 1
        ]);

        $item = null;

        if (!$items->isEmpty()) {
            $item = $items->first();
        }

        return $this->response->item($item, new PollTransformer());
    }

}
