<?php

namespace Nexo\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Nexo\Entities\User;
use Nexo\Entities\Customer;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceAssignment;
use Nexo\Entities\ServiceStatus;
use Nexo\Events\ServiceWasAccepted;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ServiceAssignmentRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Services\Assignment;
use Nexo\Transformers\ServiceAssignmentTransformer;
use Nexo\Transformers\ServiceTransformer;

class AssignmentsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ServiceRepository $repository, ServiceTransformer $transformer)
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
        $customerId = $request->get('customer_id');
        $repository = $this->repository;
        $temp = array();
        $roles = array();

        

        $user = \Auth::User();
        $roles = $user->roles()->lists('slug')->toArray();

        if(!empty($customerId)){
            $repository = $repository->scopeQuery(function ($q) use ($teamId,$customerId) {
                if(!empty($customerId)){

                    $customer = Customer::find($customerId);

                    if($customer->count() > 0){
                        $teams = $customer->user->teams;
                        if($teams){
                            foreach ($teams as $key => $team) {
                                $temp[] = $team->id;
                            }
                        }
                    }

                    if($temp){
                        return $q->where('customer_id', $customerId)
                                 ->whereIn('team_id', $temp)
                                 ->orderBy('id','DESC');                        
                    }

                    return $q->where('customer_id', $customerId)
                            ->orderBy('id','DESC'); 
                }
                return $q->where('customer_id', $customerId)    
                        ->orderBy('id','DESC'); 
            });



            return $this->collection($request, $repository);
        }

        if (!empty($teamId)) {
            $repository = $repository->scopeQuery(function ($q) use ($teamId,$customerId,$user,$roles) {
                if(!empty($customerId)){
                    return $q->where('team_id', $teamId)
                             ->where('customer_id', $customerId);
                }

                if(in_array('rutero', $roles)){
                    $q->addSelect('services.*')
                        ->join('service_user', 'service_user.service_id', '=', 'services.id')
                        ->where('services.team_id',$teamId)
                        ->where('service_user.user_id',$user->id)
                        ->orderBy('id','DESC'); 
                    //impr($q->count());
                    //exit;
                    return $q;
                    //impr($q->toSql());
                    //exit;
                }

                return $q->where('team_id', $teamId)
                        ->orderBy('id','DESC'); 
            });
        }

        return $this->collection($request, $repository);
    }


    /**
     * @param ServiceAssignment $serviceAssignment
     * @return mixed
     */
    public function show(Service $assignment)
    {
        return $this->response->item($assignment, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['team_id'] = $this->getTeamId($request);
        $input['created_by'] = $this->userApi()->id;


        $service = $this->repository->create($input);
        return $this->response->item($service, $this->transformer);
    }


    public function update(Request $request, Service $service)
    {
        $input = $request->all();
        $input['team_id'] = $this->getTeamId($request);

        $service = $this->repository->update($input, $service->id);
        return $this->response->item($service, $this->transformer);
    }


    public function calculateRecurrence(Request $request)
    {
        $recurrenceDays = Assignment::calculateRecurrence($request->all());
        return $this->response->array($recurrenceDays);
    }

}
