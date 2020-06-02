<?php

namespace Nexo\Http\Controllers;

use Illuminate\Http\Request;

use Nexo\Entities\ServiceItem;
use Nexo\Entities\ServiceType;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceItemRepository;
use Nexo\Validators\ServiceItemValidator;

class TeamServicesTypesItemsController extends Controller
{

    protected $repository, $validator;


    public function __construct(ServiceItemRepository $repository, ServiceItemValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team, ServiceType $serviceType)
    {
        $items = $this->repository->findByField('service_type_id', $serviceType->id);
        return view('team.services-types.items.list', compact('items', 'team', 'serviceType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Team $team, ServiceType $serviceType)
    {
        return view('team.services-types.items.create', compact('team', 'serviceType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Team $team, ServiceType $serviceType)
    {
        $input = $request->except('_method');
        $this->makeValidator($request, 'create');
        $this->repository->create($input);

        $message = 'El item para el tipo de servicio ha sido creado correctamente';


        return redirect()->route('team.services-types.services-items.index', [$team->slug, $serviceType->id])->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Team $team, ServiceType $serviceType, ServiceItem $item)
    {
        return view('team.services-types.items.edit', compact('team', 'serviceType', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Team $team, ServiceType $serviceType, ServiceItem $item)
    {
        $input = $request->except('_method');
        $this->makeValidator($request, 'update', $item->id);
        $this->repository->update($input, $item->id);

        $message = 'Item de tipo de servicio editado correctamente.';

        return redirect()->route('team.services-types.services-items.index', [$team->slug, $serviceType->id])->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Request $request, Team $team, ServiceType $serviceType, ServiceItem $item)
    {
        $this->repository->delete($item->id);
        $message = 'Item de tipo de servicio eliminado correctamente.';
        return redirect()->route('team.services-types.services-items.index', [$team->slug, $serviceType->id])->with('success', $message);
    }
}
