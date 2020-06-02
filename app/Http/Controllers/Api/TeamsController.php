<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\TeamTransformer;
use Vinkla\Hashids\Facades\Hashids;


/**
 * Class TeamsController
 * @package Nexo\Http\Controllers\Api
 */
class TeamsController extends Controller
{
    use ApiResponse;

    /**
     * @var TeamRepository
     */
    /**
     * @var TeamRepository|TeamTransformer
     */
    protected $repository, $transformer, $userRepository;

    /**
     * TeamsController constructor.
     * @param TeamRepository $repository
     * @param TeamTransformer $transformer
     */
    public function __construct(TeamRepository $repository, TeamTransformer $transformer, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->collection($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team)
    {
        return $this->response->item($team, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $payload = $request->all();

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
    public function update(Request $request, $model)
    {
        $fields = [
            'name',
            'slug',
            'status',
            'logo',
            'work_time_start',
            'work_time_end',
            'work_time_minutes',
            'modules',
            'limits'
        ];

        $model = $this->repository->update($request->only($fields), $model->id);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team)
    {
        $this->repository->delete($team->id);
        return $this->response->noContent();
    }


    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function usersLocalizations(Request $request, Team $team)
    {
        $teamId = $team->id;
        $roles = $request->get('roles');
        $return = collect([]);

        $users = $this->userRepository->scopeQuery(function ($query) use ($teamId, $roles) {
            $queryReturn = $query->whereHas('teams', function ($query) use ($teamId) {
                return $query->where('id', $teamId);
            });

            if (!empty($roles)) {
                $roles = explode(',', $roles);

                $queryReturn = $queryReturn->whereHas('roles', function ($query) use ($roles) {
                    return $query->whereIn('slug', $roles);
                });
            }

            return $queryReturn;
        })->all();

        $users->each(function ($user) use ($return) {
            $lastLocalization = $user->lastGeolocalization();

            $temp = [
                'id' => (int)$user->id,
                'name' => $user->name,
                'avatar' => $user->avatarSizes(),
                'roles' => $user->roles->lists('slug'),
            ];

            if (!empty($lastLocalization)) {
                $temp['latitude'] = $lastLocalization->latitude;
                $temp['longitude'] = $lastLocalization->longitude;
                $temp['last_localization'] = $lastLocalization->created_at;
            }

            $return->push($temp);
        });

        return $this->response->array($return->toArray());
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function rolesLimits(Team $team)
    {
        $limits = $team->limits->map(function ($limit) use ($team) {

            $used = $team->users->filter(function ($user) use ($limit) {
                $rolesIds = $user->roles->lists('id')->toArray();
                return in_array($limit->role_id, $rolesIds);
            })->count();

            $percentage = ($used / $limit->limit) * 100;

            return [
                'id' => Hashids::encode($limit->id),
                'name' => $limit->role->name,
                'slug' => $limit->role->slug,
                'limit' => (int)$limit->limit,
                'used' => $used,
                'percentage' => $percentage
            ];
        });


        return $this->response->array($limits->toArray());
    }


    /**
     * @param Team $team
     * @return mixed
     */
    public function quickStats(Team $team)
    {
        $quickStats = [
            'services' => [
                'por_ejecutar' => 1,
                'en_ejecucion' => 0,
                'vencidos' => 10,
                'finalizados' => 30
            ],
            'users' => [
                'active' => 9,
                'inactive' => 30
            ]
        ];

        return $this->response->array($quickStats);
    }


    /**
     * @param Team $team
     * @return mixed
     */
    public function canCreateService(Team $team)
    {
        $check = $team->servicesTypes->count() > 0;

        if ($check) {
            $this->response->noContent();
        }

        $this->response->errorBadRequest('No es posible crear servicios ya que no tiene categorías de servicios creadas.');
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function canCreateProduct(Team $team)
    {
        $check = $team->productsCategories->count() > 0;

        if ($check) {
            $this->response->noContent();
        }

        $this->response->errorBadRequest('No es posible crear productos ya que no tiene categorías de productos creadas.');
    }

}
