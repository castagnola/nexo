<?php

namespace Nexo\Http\Controllers\Api\Team;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceType;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
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
     * @param User $user
     * @return mixed
     */
    public function index(Team $team)
    {
        $items = $this->repository->findByField('team_id', $team->id);
        return $this->response->collection($items, $this->transformer);
    }


    /**
     * @param User $user
     * @return mixed
     */
    public function show(Team $team, ServiceType $serviceType)
    {
        return $this->response->item($serviceType, $this->transformer);
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
    public function update(Request $request, Team $team, ServiceType $serviceType)
    {
        $model = $this->repository->update($request->all(), $serviceType->id);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team, ServiceType $serviceType)
    {
        $this->repository->delete($serviceType->id);
        return $this->response->noContent();
    }
}
