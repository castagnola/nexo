<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\RoleTransformer;
use Nexo\Transformers\UserTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

class RolesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(RoleRepository $repository, RoleTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function index()
    {
        $items = $this->repository->all();

        return $this->response->collection($items, $this->transformer);
    }
}
