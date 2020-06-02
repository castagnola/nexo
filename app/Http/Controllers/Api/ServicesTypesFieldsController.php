<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceType;
use Nexo\Entities\ServiceTypeField;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceTypeFieldRepository;
use Nexo\Transformers\ServiceTypeFieldTransformer;

/**
 * Class ServicesTypesFieldsController
 * @package Nexo\Http\Controllers\Api
 */
class ServicesTypesFieldsController extends Controller
{
    use ApiResponse;

    /**
     * @var ServiceTypeFieldRepository
     */
    /**
     * @var ServiceTypeFieldRepository|ServiceTypeFieldTransformer
     */
    protected $repository, $transformer;

    /**
     * @param ServiceTypeFieldRepository $repository
     * @param ServiceTypeFieldTransformer $transformer
     */
    public function __construct(ServiceTypeFieldRepository $repository, ServiceTypeFieldTransformer $transformer)
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
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, ServiceType $serviceType, ServiceTypeField $serviceTypeField)
    {
        $model = $this->repository->update($request->all(), $serviceTypeField->id);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(ServiceType $serviceType, ServiceTypeField $serviceTypeField)
    {
        $this->repository->delete($serviceTypeField->id);
        return $this->response->noContent();
    }
}
