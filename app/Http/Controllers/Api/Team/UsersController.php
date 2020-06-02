<?php

namespace Nexo\Http\Controllers\Api\Team;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\Team;
use Nexo\Entities\UserGeolocalization;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\UserTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

class UsersController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer, $validator;

    public function __construct(UserRepository $repository, UserTransformer $transformer, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->validator = $validator;

        $this->middleware('api.auth', ['only' => ['channel']]);
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function index(Team $team)
    {
        $items = $this->repository->scopeQuery(function ($query) use ($team) {
            return $query->whereHas('teams', function ($query) use ($team) {
                return $query->where('id', $team->id);
            });
        })->all();

        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function show(Team $team, User $user)
    {
        return $this->response->item($user, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request, Team $team)
    {
        $payload = $request->all();
        $payload['team_id'] = $team->id;

        $roleId = $payload['role_id'];

        if (!$team->canCreateUsersByRoleId($roleId)) {
            return $this->response->errorBadRequest('Ha excedido el límite de creación para el grupo seleccionado.');
        }


        $model = $this->repository->create($payload);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Team $team, User $user)
    {
        if ($request->has('role_id')) {
            $roleId = $request->get('role_id');

            if ($user->roles->where('id', $roleId)->isEmpty()) {
                if (!$team->canCreateUsersByRoleId($roleId)) {
                    return $this->response->errorBadRequest('Ha excedido el límite de creación para el grupo seleccionado.');
                }
            }
        }

        $model = $this->repository->update($request->all(), $user->id);

        return $this->response->item($model, $this->transformer);
    }


    /**
     * @param Team $team
     * @param User $user
     * @return mixed
     */
    public function destroy(Team $team, User $user)
    {

        $this->repository->delete($user->id);
        return $this->response->noContent();
    }

    /**
     * @return mixed
     */
    public function locations(Team $team)
    {

        $geolocations = UserGeolocalization::whereHas('user', function ($query) use ($team) {
            return $query->whereHas('teams', function ($query) use ($team) {
                return $query->where('id', $team->id);
            });
        })->orderBy('created_at', 'DESC')->groupBy('user_id')->get();

        $geolocations = $geolocations->map(function ($geolocation) {
            $geolocation->user_name = $geolocation->user->name;
            $geolocation->user_avatar = $geolocation->user->present()->avatarUrl('marker');

            return $geolocation;
        });

        return $this->response->array($geolocations->toArray());
    }


    public function busy(Request $request)
    {
        $payload = $request->only('ids', 'start', 'end', 'exclude_services_ids');


        \DB::enableQueryLog();
        // Buscando usuarios con asignaciones según lo indicado
        $busyUsers = ServiceAssignment::whereHas('user', function ($query) use ($payload) {
            return $query->whereIn('id', $payload['ids']);
        })->whereHas('service', function ($query) use ($payload) {
            $query->where(function ($query) use ($payload) {
                return $query->where(function ($query) use ($payload) {
                    return $query->where('start_at', '>=', $payload['start'])->where('start_at', '<=', $payload['end']);
                })->orWhere(function ($query) use ($payload) {
                    return $query->where('end_at', '<=', $payload['start'])->where('end_at', '>=', $payload['end']);
                });
            });

            if (isset($payload['exclude_services_ids'])) {
                $query->whereNotIn('id', $payload['exclude_services_ids']);
            }
        })
            ->select('user_id')
            ->get()
            ->lists('user_id')
            ->toArray();


        //dd(\DB::getQueryLog());

        return $this->response->array($busyUsers);
    }

    /**
     * @return mixed
     */
    public function channel(Team $team)
    {
        $websocketUrl = env('WEBSOCKET_URL');



       dd('asdsad');

        $channels = [
            "user.{$user->id}",
            "team.{$team->id}"
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

}
