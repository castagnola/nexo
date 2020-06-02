<?php

namespace Nexo\Http\Controllers\Api\Team;

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
    public function index(Team $team)
    {
        $items = $this->repository->findWhereIn('slug', ['team-admin', 'rutero', 'despachador']);

        return $this->response->collection($items, $this->transformer);
    }
}
