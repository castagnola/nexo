<?php

namespace Nexo\Http\Controllers;

use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Entities\Service;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Repositories\ServiceTypeRepository;

class TeamServicesController extends Controller
{
    protected $repository, $customerRepository, $serviceTypeRepository, $validator;

    public function __construct(ServiceTypeRepository $repository, CustomerRepository $customerRepository, ServiceTypeRepository $serviceTypeRepository)
    {
        $this->middleware('has.access:services.all-services');

        $this->repository = $repository;
        $this->customerRepository = $customerRepository;
        $this->serviceTypeRepository = $serviceTypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        return view('team.services.list', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Team $team)
    {
        $customers = $this->customerRepository->findByField('team_id', $team->id);

        $servicesTypes = $this->serviceTypeRepository->findByField('team_id', $team->id);

        // No hay tipos de servicios, no es posible crear
        if ($servicesTypes->isEmpty()) {
            $showCreateButton = $this->hasAccess('services-types.create');
            return view('team.services.errors.create-no-services-types', compact('team', 'showCreateButton'));
        }

        \JavaScript::put([
            'creationData' => [
                'haveCustomers' => !$customers->isEmpty(),
                'documentTypes' => config('nexo.documentTypes'),
                'servicesTypes' => $servicesTypes->toArray(),
                'workTimeMinutes' => $team->work_time_minutes
            ]
        ]);

        return view('team.services.create', compact('team', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, Service $service)
    {
        \JavaScript::put([
            'serviceCode' => $service->code
        ]);

        return view('team.services.show')->with(compact('team', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Team $team, Service $service)
    {
        dd($team, $service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}