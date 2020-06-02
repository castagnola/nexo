<?php

namespace Nexo\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Service;
use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\ServiceStatus;
use Nexo\Entities\UserDevice;
use Nexo\Events\ServiceWasAccepted;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Repositories\UserDeviceRepository;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Transformers\UserDeviceTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserDeviceValidator;

class UsersServicesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceRepository $repository, ServiceStatusRepository $serviceStatusRepository, ServiceTransformer $transformer)
    {
        $this->repository = $repository;
        $this->serviceStatusRepository = $serviceStatusRepository;
        $this->transformer = $transformer;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        $items = $this->repository->scopeQuery(function ($query) use ($user) {
            return $query->where(function ($query) use ($user) {
                return $query->whereHas('users', function ($query) use ($user) {
                    return $query->where('id', $user->id);
                })->orWhereHas('customer', function ($query) use ($user) {
                    return $query->where('user_id', $user->id);
                });
            });
        })->all();

        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function show(User $user, Service $service)
    {
        return $this->response->item($service, $this->transformer);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Service $service
     */
    public function update(Request $request, User $user, Service $service)
    {
        $payload = $request->only('status');

        if ($request->exists('status')) {
            $statusSlug = $request->get('status');
            try {
                $status = ServiceStatus::where('slug', $statusSlug)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return $this->response->errorBadRequest('El estado proporcionado es inválido o no existe.');
            }

            $payload['service_status_id'] = $status->id;
        }

        $model = $this->repository->update($payload, $service->id);
        return $this->response->item($model, $this->transformer);
    }
}
