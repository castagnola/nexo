<?php

namespace Nexo\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class ApiResponse
 * @package Nexo\Http\Controllers\Api
 */
trait ApiResponse
{
    use Helpers;


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->repository->all();
        return $this->response->collection($items, $this->transformer);
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
            $data['team_id'] = $teamId;
        }

        $model = $this->repository->create($data);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($model)
    {
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
        $input = $request->except(['created_at', 'updated_at']);

        $model = $this->repository->update($input, $model->id);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($model)
    {
        $this->repository->delete($model->id);
        return $this->response->noContent();
    }


    /**
     * @param $repository
     * @return mixed
     */
    protected function collection($request, $repository = null)
    {
        if (is_null($repository)) {
            $repository = $this->repository;
        }

        if ($request->has('limit')) {
            return  $this->response->paginator($repository->paginate($request->get('limit')), $this->transformer);
        }


        return $this->response->collection($repository->all(), $this->transformer);
    }
}