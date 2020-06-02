<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Transformers\ServiceStatusTransformer;
use Nexo\Entities\User;

class ServicesStatusesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceStatusRepository $repository, ServiceStatusTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }
}
