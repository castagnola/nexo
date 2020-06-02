<?php

namespace Nexo\Http\Controllers\Api;


use Illuminate\Http\Request;
use Nexo\Entities\Customer;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Transformers\CustomerTransformer;

/**
 * Class CustomersController
 * @package Nexo\Http\Controllers\Api
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
    protected $repository, $transformer;

    /**
     * CustomersController constructor.
     * @param CustomerRepository $repository
     * @param CustomerTransformer $transformer
     */
    public function __construct(CustomerRepository $repository, CustomerTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $request['orderBy'] = 'customers.id';
        $repository = $this->repository->scopeQuery(function ($q) use ($teamId) {
            $q->addSelect('customers.*')
                     //->join('users', 'customers.user_id', '=', 'users.id')
                     ->join('team_user', 'customers.user_id', '=', 'team_user.user_id')
                     //->join('users', 'customers.user_id', '=', 'users.id')
                     //->join('team_user', 'team_user.user_id', '=', 'users.id')
                     ->where('team_user.team_id',$teamId);

            return $q;
            //impr($teamId);
            //impr($q->toSql());
            //exit;
                     //->orderBy('customers.id', 'desc');
            //return $q->where('team_id', $teamId);
        });



        return $this->collection($request, $repository);
    }


    /**
     * @param Customer $customer
     * @return \Dingo\Api\Http\Response
     */
    public function show(Customer $customer)
    {
        return $this->response->item($customer, $this->transformer);
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function store(Request $request)
    {
            $teamId = $this->getTeamId($request);
            $attributes = $request->all();
            $attributes['team_id'] = $teamId;
            $model = $this->repository->create($attributes);
            return $this->response->item($model, $this->transformer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        $teamId = $this->getTeamId($request);
        $attributes = $request->all();
        $attributes['team_id'] = $teamId;
        $model = $this->repository->update($attributes, $customer->id);
        return $this->response->item($model, $this->transformer);
    }


}
