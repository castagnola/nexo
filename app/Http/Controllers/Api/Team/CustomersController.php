<?php

namespace Nexo\Http\Controllers\Api\Team;

use Illuminate\Http\Request;

use Nexo\Entities\Customer;
use Nexo\Entities\CustomerAddress;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\CustomerRepository;
use Nexo\Transformers\CustomerTransformer;
use Nexo\Validators\CustomerValidator;

/**
 * Class CustomersController
 * @package Nexo\Http\Controllers\Api\Team
 */
class CustomersController extends Controller
{
    use ApiResponse;

    /**
     * @var CustomerRepository
     */
    /**
     * @var CustomerRepository|CustomerTransformer
     */
    /**
     * @var CustomerRepository|CustomerTransformer|CustomerValidator
     */
    protected $repository, $transformer, $validator;

    /**
     * CustomersController constructor.
     * @param CustomerRepository $repository
     * @param CustomerTransformer $transformer
     * @param CustomerValidator $validator
     */
    public function __construct(CustomerRepository $repository, CustomerTransformer $transformer, CustomerValidator $validator)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        $items = $this->repository->findByField('team_id', $team->id);
        return $this->response->collection($items, $this->transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, Customer $model)
    {
        return $this->response->item($model, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Team $team)
    {
        $input = $request->all();
        $input['team_id'] = $team->id;
        $customer = $this->repository->create($input);
        return $this->response->item($customer, new $this->transformer);
    }


    /**
     * @param Request $request
     * @param Team $team
     * @param Customer $model
     * @return mixed
     */
    public function update(Request $request, Team $team, Customer $model)
    {
        $input = $request->except(['created_at', 'updated_at', 'deleted_at', 'team_id', 'user_id']);

        $this->makeApiValidator($input, 'update');
        $model = $this->repository->update($input, $model->id);
        return $this->response->item($model, new $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team, Customer $model)
    {
        $this->repository->delete($model->id);
        return $this->response->noContent();
    }



}
