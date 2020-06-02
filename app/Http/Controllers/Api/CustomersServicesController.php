<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Customer;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceStatus;
use Nexo\Entities\UserDevice;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Entities\User;

class CustomersServicesController extends Controller
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
    public function index(Customer $customer)
    {
        $items = $this->repository->scopeQuery(function ($query) use ($customer) {
            return $query->where('customer_id', $customer->id);
        })->all();

        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function show(Customer $customer, Service $service)
    {
        return $this->response->item($service, $this->transformer);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Service $service
     */
    public function update(Request $request, Customer $customer, Service $service)
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

    /**
     * @param Request $request
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function finish(Request $request, User $user, Service $service)
    {
        $payload = $request->only('observation', 'code');

        $status = ServiceStatus::where('slug', 'realizado')->firstOrFail();

        $payloadForService['service_status_id'] = $status->id;

        $model = $this->repository->update($payloadForService, $service->id);
        return $this->response->item($model, $this->transformer);
    }
}
