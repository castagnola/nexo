<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Entities\User;

class UsersAssignmentsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceRepository $repository, ServiceTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index(Request $request, User $user)
    {
        $repository = $this->repository->scopeQuery(function ($q) use ($user) {
            return $q->whereHas('users', function ($q) use ($user) {
                return $q->where('id', $user->id);
            });
        });

        $items = $repository->paginate($request->get('limit', 100));

        return $this->response->paginator($items, $this->transformer);
    }
}
