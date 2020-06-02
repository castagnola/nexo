<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ModuleRepository;
use Nexo\Repositories\TransportRepository;
use Nexo\Transformers\ModuleTransformer;
use Nexo\Transformers\TransportTransformer;
use Nexo\Entities\User;

class TransportsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(TransportRepository $repository, TransportTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }
}
