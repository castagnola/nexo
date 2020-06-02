<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\LocationCityRepository;
use Nexo\Transformers\LocationCityTransformer;

class CitiesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer, $validator;

    public function __construct(LocationCityRepository $repository, LocationCityTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->collection($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, LocationCity $city)
    {
        return $this->response->item($city, $this->transformer);
    }
}
