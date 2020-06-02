<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Service;
use Nexo\Entities\UserDevice;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\RouteRepository;
use Nexo\Repositories\UserDeviceRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\RouteTransformer;
use Nexo\Transformers\UserDeviceTransformer;
use Nexo\Transformers\UserTransformer;
use Nexo\Entities\User;
use Nexo\Validators\UserDeviceValidator;

class RoutesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(RouteRepository $repository, RouteTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function calculate(Request $request, Service $service, User $user)
    {
        $route = false;
        $routes = $this->repository->findWhere([
            'service_id' => $service->id,
            'user_id' => $user->id
        ]);

        if (!$routes->isEmpty()) {
            $route = $routes->last();
        }

        $check = !empty($route);

        if (!$check) {

            $params = $request->only('latitude', 'longitude');


            $params['service_id'] = $service->id;
            $params['user_id'] = $user->id;

            $route = $this->repository->create($params);
        }

        return $this->response->item($route, $this->transformer);
    }
}
