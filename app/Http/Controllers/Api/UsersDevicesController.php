<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\UserDevice;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\UserDeviceRepository;
use Nexo\Transformers\UserDeviceTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserDeviceValidator;

class UsersDevicesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(UserDeviceRepository $repository, UserDeviceTransformer $transformer, UserDeviceValidator $validator)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        $items = $this->repository->findByField('user_id', $user->id);
        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return mixed
     */
    public function store(Request $request, User $user)
    {
        $attributes = $request->all();
        $attributes['user_id'] = $user->id;

        $devices = $this->repository->findWhere([
            'user_id' => $attributes['user_id'],
            'token' => $attributes['token']
        ]);

        if ($devices->isEmpty()) {
            $this->makeApiValidator($attributes, 'new');
            $item = $this->repository->create($attributes);
        } else {
            $item = $devices->first();
        }

        return $this->response->item($item, $this->transformer);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param UserDevice $device
     * @return mixed
     */
    public function update(Request $request, User $user, UserDevice $device)
    {
        $model = $this->repository->update($request->all(), $device->id);
        return $this->response->item($model, $this->transformer);
    }
}
