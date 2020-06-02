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
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Repositories\UserDeviceRepository;
use Nexo\Transformers\ServiceNoveltyTransformer;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Transformers\UserDeviceTransformer;
use Nexo\Entities\User;
use Nexo\Validators\ServiceNoveltyValidator;
use Nexo\Validators\UserDeviceValidator;

class ServicesNoveltiesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceNovelty $repository, ServiceRepository $serviceRepository, ServiceNoveltyTransformer $transformer, ServiceNoveltyValidator $validator)
    {
        $this->repository = $repository;
        $this->serviceRepository = $serviceRepository;
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {

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
        $payload = $request->only('observation');
        $payload['service_id'] = $service->id;

        $this->makeApiValidator($payload, 'new');

        $model = $this->repository->create($payload);

        // Cambiar de estado del servicio
        $status = ServiceStatus::where('slug', 'con-novedad')->first();
        $this->serviceRepository->update([
            'service_status_id' => $status->id
        ], $service->id);

        return $this->response->item($model, $this->transformer);
    }
}
