<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceType;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceTypeRepository;
use Nexo\Transformers\ServiceTypeTransformer;
use Nexo\Entities\User;

class ServicesTypesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    /**
     * @param ServiceTypeRepository $repository
     * @param ServiceTypeTransformer $transformer
     */
    public function __construct(ServiceTypeRepository $repository, ServiceTypeTransformer $transformer)
    {
        $this->repository = $repository;
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
    public function show(ServiceType $model)
    {
        return $this->response->item($model, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $team = $this->getTeam($request);

        $input = $request->all();
        $input['team_id'] = $team->id;
        $item = $this->repository->create($input);

        return $this->response->item($item, new $this->transformer);
    }


    /**
     * @param Request $request
     * @param Team $team
     * @param Customer $model
     * @return mixed
     */
    public function update(Request $request, ServiceType $model)
    {
        $input = $request->except(['created_at', 'updated_at', 'deleted_at', 'team_id', 'user_id']);

        //$this->makeApiValidator($input, 'update');
        $model = $this->repository->update($input, $model->id);
        return $this->response->item($model, new $this->transformer);
    }
}
