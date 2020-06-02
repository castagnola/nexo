<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;
use Nexo\Entities\Customer;
use Nexo\Entities\CustomerAddress;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\CustomerAddressRepository;
use Nexo\Services\Maps;
use Nexo\Transformers\CustomerAddressTransformer;

class CustomersAddressesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer, $validator;


    public function __construct(CustomerAddressRepository $repository, CustomerAddressTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Customer $customer)
    {
        $items = $this->repository->findByField('customer_id', $customer->id);
        return $this->response->collection($items, $this->transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Customer $customer, CustomerAddress $customerAddress)
    {
        $input = $request->except(['created_at', 'updated_at']);

        $model = $this->repository->update($input, $customerAddress->id);

        return $this->response->item($model, $this->transformer);
    }

    public function fix($customer, $customerAddress, $withCity = false)
    {


        $addressToSearch = @$customerAddress->street?:'';
        if($addressToSearch){
            if ($withCity) {
                $addressToSearch = $customerAddress->city->name;
            }

            $location = Maps::getCoordinatesFromAddress($addressToSearch);

            if (!empty($location)) {
                $customerAddress->latitude = $location->lat;
                $customerAddress->longitude = $location->lng;

                //$customerAddress->map = $customerAddress->updateMap();

                $customerAddress->save();

                return $this->response->item($customerAddress, $this->transformer);
            } else {
                return $this->fix($customerAddress, true);
            }
        }


        return $this->response->errorBadRequest('Hubo un error al arreglar la dirección.');
    }

    public function search($customer, $customerAddress, $withCity = false)
    {
        return $this->response->item($customerAddress, $this->transformer);
    }
}
