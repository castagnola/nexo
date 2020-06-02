<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ModuleRepository;
use Nexo\Transformers\ModuleTransformer;
use Nexo\Entities\User;

class ModulesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ModuleRepository $repository, ModuleTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }
}
