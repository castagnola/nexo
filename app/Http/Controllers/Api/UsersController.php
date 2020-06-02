<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Http\Requests\UserChangeLangRequest;
use Nexo\Repositories\TeamRepository;
use Nexo\Repositories\UserGeolocalizationRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\UserGeolocalizationTransformer;
use Nexo\Transformers\UserTransformer;
use Nexo\Entities\User;

/**
 * Class UsersController
 * @package Nexo\Http\Controllers\Api
 */
class UsersController extends Controller
{
    use ApiResponse;

    /**
     * @var UserRepository
     */
    /**
     * @var UserRepository|UserTransformer
     */
    protected $repository, $transformer, $teamRepository, $userGeolocalizationRepository, $UserGeolocalizationTransformer;

    /**
     * @param UserRepository $repository
     * @param UserTransformer $transformer
     */
    public function __construct(UserRepository $repository, UserTransformer $transformer, TeamRepository $teamRepository, UserGeolocalizationRepository $userGeolocalizationRepository, UserGeolocalizationTransformer $UserGeolocalizationTransformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->teamRepository = $teamRepository;
        $this->userGeolocalizationRepository = $userGeolocalizationRepository;
        $this->UserGeolocalizationTransformer = $UserGeolocalizationTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);

        if (!empty($teamId)) {
            $items = $this->repository->scopeQuery(function ($query) use ($teamId) {
                $query->whereHas('roles', function ($query) {
                    return $query->whereIn('slug', ['despachador','team-admin','admin','rutero']);
                });
                return $query->whereHas('teams', function ($query) use ($teamId) {
                    return $query->where('id', $teamId);
                });
            })->all();
        } else {
            $items = $this->repository->scopeQuery(function ($query) {
                return $query->whereHas('roles', function ($query) {
                    return $query->whereIn('slug', ['admin', 'nexo-user']);
                });
            })->all();
        }

        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function show(User $user)
    {
        $user->updateAppStatus();

        return $this->response->item($user, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $data = $request->all();


        if (!empty($teamId)) {
            $team = $this->teamRepository->find($teamId);
            $data['team_id'] = $team->id;

            if (!$team->canCreateUsersByRole($data['role_id'])) {
                return $this->response->errorBadRequest(trans('validation.users_role_limit'));
            }
        }

        $model = $this->repository->create($data);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(User $user)
    {

        $this->repository->delete($user->id);
        return $this->response->noContent();
    }


    /**
     * @return mixed
     */
    public function channel()
    {
        $websocketUrl = env('WEBSOCKET_URL');

        return $this->response->array([
            'url' => "{$websocketUrl}",
            'channels' => []
        ]);

        $user = $this->userApi();

        if (empty($user)) {
            $this->response->errorUnauthorized();
        }

        $channels = [
            "user.{$user->id}"
        ];

        foreach ($user->teams as $team) {
            $channels[] = "team.{$team->id}";
        }

        if ($user->inRole('admin')) {
            $channels[] = 'nexo';
        }

        return $this->response->array([
            'url' => "{$websocketUrl}",
            'channels' => $channels
        ]);
    }

    /**
     * @return mixed
     */
    public function appStatus()
    {
        $user = $this->userApi();
        $user->updateAppStatus();

        $servicesBusy = $user->services->filter(function ($service) {
            return in_array($service->status->slug, config('nexo.actived_statuses'));
        });

        $serviceBusy = $servicesBusy->first();
        $busyServiceId = null;

        if (!empty($serviceBusy)) {
            $busyServiceId = $serviceBusy->id;
        }

        return $this->response->array([
            'status' => $user->app_status,
            'busy_service_id' => $busyServiceId
        ]);
    }


    /**
     * @param Request $request
     */
    public function changeLang(UserChangeLangRequest $request)
    {
        $user = $this->userApi();

        $user->lang = $request->get('lang');
        $user->save();

        return $this->response->array([
            'status' => true,
            'lang' => $user->lang
        ]);

    }

    public function locations(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $items = $this->userGeolocalizationRepository->orderBy('users_geolocalizations.user_id', 'DESC')->scopeQuery(function ($query) use ($teamId) {
            return $query->groupBy('user_id')->whereHas('user', function ($query) use ($teamId) {
                return $query->whereHas('teams', function ($query) use ($teamId) {
                    return $query->where('id', $teamId);
                });
            });
        })->all();

        return $this->response->collection($items, $this->UserGeolocalizationTransformer);
    }
}
