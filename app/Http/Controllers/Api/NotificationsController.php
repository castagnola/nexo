<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\NotificationRepository;
use Nexo\Transformers\NotificationTransformer;
use Nexo\Entities\User;

class NotificationsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(NotificationRepository $repository, NotificationTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index()
    {
        $items = $this->repository->findByField('user_id', \Sentinel::getUser()->id);
        return $this->response->collection($items, $this->transformer);
    }
}
