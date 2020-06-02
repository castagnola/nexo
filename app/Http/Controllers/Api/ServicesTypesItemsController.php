<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceItem;
use Nexo\Entities\ServiceType;
use Nexo\Entities\ServiceTypeField;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceItemRepository;
use Nexo\Transformers\ServiceItemTransformer;

/**
 * Class ServicesTypesFieldsController
 * @package Nexo\Http\Controllers\Api
 */
class ServicesTypesItemsController extends Controller
{
    use ApiResponse;


    /**
     * @var ServiceItemRepository
     */
    /**
     * @var ServiceItemRepository|ServiceItemTransformer
     */
    protected $repository, $transformer;


    /**
     * @param ServiceItemRepository $repository
     * @param ServiceItemTransformer $transformer
     */
    public function __construct(ServiceItemRepository $repository, ServiceItemTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }


    /**
     * @param ServiceType $serviceType
     * @return mixed
     */
    public function index(ServiceType $serviceType)
    {
        $items = $this->repository->findByField('service_type_id', $serviceType->id);
        return $this->response->collection($items, $this->transformer);
    }


    /**
     * @param Request $request
     * @param ServiceType $serviceType
     * @param ServiceTypeField $serviceTypeField
     * @return mixed
     */
    public function update(Request $request, ServiceType $serviceType, ServiceItem $serviceItem)
    {
        $model = $this->repository->update($request->all(), $serviceItem->id);

        return $this->response->item($model, $this->transformer);
    }


    /**
     * @param ServiceType $serviceType
     * @param ServiceTypeField $serviceTypeField
     * @return mixed
     */
    public function destroy(ServiceType $serviceType, ServiceItem $serviceItem)
    {
        $this->repository->delete($serviceItem->id);
        return $this->response->noContent();
    }
}
