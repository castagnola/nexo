<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Service;
use Nexo\Entities\ServiceNovelty;
use Nexo\Entities\ServiceStatus;
use Nexo\Entities\UserDevice;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceLocationRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Repositories\UserDeviceRepository;
use Nexo\Transformers\ServiceLocationTransformer;
use Nexo\Transformers\ServiceNoveltyTransformer;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Transformers\UserDeviceTransformer;
use Nexo\Entities\User;
use Nexo\Validators\ServiceNoveltyValidator;
use Nexo\Validators\UserDeviceValidator;

class ServicesLocationsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceLocationRepository $repository, ServiceLocationTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index(Service $service)
    {
        $model = $this->repository->findByField('service_id', $service->id);


        return $this->response->collection($model, $this->transformer);
    }

    /**
     * @param User $user
     * @param Service $service
     * @return mixed
     */
    public function show(User $user, Service $service)
    {

    }

    /**
     * @param Request $request
     * @param User $user
     * @param Service $service
     */
    public function store(Request $request, Service $service)
    {
        if ($service->status->slug != 'en-ruta') {
            return $this->response->errorBadRequest('El servicio no se encuentra en ruta.');
        }

        $payload = $request->all();

        $payload['service_id'] = $service->id;

        $model = $this->repository->create($payload);

        return $this->response->item($model, $this->transformer);
    }
}
