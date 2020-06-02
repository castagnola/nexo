<?php

namespace Nexo\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\AssignTransformer;
use Nexo\Transformers\ServiceTransformer;

/**
 * Class ServicesController
 * @package Nexo\Http\Controllers\Api
 */
class AssignsController extends Controller
{
    use ApiResponse;

    /**
     * @var ServiceRepository
     */
    /**
     * @var ServiceRepository|ServiceTransformer
     */
    protected $repository, $transformer;

    /**
     * @param ServiceRepository $repository
     * @param ServiceTransformer $transformer
     */
    public function __construct(ServiceRepository $repository, ServiceTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }


    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);

        $repository = $this->repository->scopeQuery(function ($q) use ($teamId) {
            return $q->where('team_id', $teamId);
        });

        return $this->collection($request, $repository);
    }
}
