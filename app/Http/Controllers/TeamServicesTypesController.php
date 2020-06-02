<?php

namespace Nexo\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\ServiceType;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceTypeRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Validators\ServiceTypeValidator;

class TeamServicesTypesController extends Controller
{
    protected $teamRepository, $repository, $validator;


    public function __construct(ServiceTypeRepository $repository, TeamRepository $teamRepository, ServiceTypeValidator $validator)
    {
        $this->repository = $repository;
        $this->teamRepository = $teamRepository;
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
        return view('team.services-types.list', compact('items', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Team $team)
    {
        return view('team.services-types.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Team $team)
    {

        $input = $request->except('_method');

        $this->makeValidator($request, 'create');
        $this->repository->create($input);

        $message = 'Tipo de servicio creado correctamente';


        return redirect()->route('team.services-types.index', ['team' => $team->slug])->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, ServiceType $item)
    {
        return view('team.services-types.show', compact('team', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Team $team, ServiceType $item)
    {
        return view('team.services-types.edit', compact('team', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Team $team, ServiceType $item)
    {
        $input = $request->except('_method');
        $this->makeValidator($request, 'update', $item->id);
        $this->repository->update($input, $item->id);

        $message = 'Tipo de servicio editado correctamente';

        return redirect()->route('team.services-types.index', ['team' => $team->slug])->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team, ServiceType $item)
    {
        // Eliminando los items primero
        $item->items()->delete();
        $this->repository->delete($item->id);
        $message = 'tipo de servicio eliminado correctamente.';
        return redirect()->route('team.services-types.index', [$team->slug])->with('success', $message);
    }
}
