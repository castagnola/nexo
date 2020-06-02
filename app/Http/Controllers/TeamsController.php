<?php

namespace Nexo\Http\Controllers;

use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Criteria\Role\OnlyTeamRolesCriteria;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ModuleRepository;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\TeamRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Validator, Storage;

/**
 * Class TeamsController
 * @package Nexo\Http\Controllers
 */
class TeamsController extends Controller
{
    /**
     * @var TeamRepository
     */
    /**
     * @var ModuleRepository|TeamRepository
     */
    /**
     * @var ModuleRepository|RoleRepository|TeamRepository
     */
    /**
     * @var ModuleRepository|RoleRepository|TeamRepository
     */
    protected $repository, $moduleRepository, $roleRepository, $validator;

    /**
     * TeamsController constructor.
     * @param TeamRepository $repository
     * @param ModuleRepository $moduleRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(TeamRepository $repository, ModuleRepository $moduleRepository, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->moduleRepository = $moduleRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = $this->repository->all();
        return view('teams.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->roleRepository->pushCriteria(new OnlyTeamRolesCriteria());
        $modules = $this->moduleRepository->all();
        $roles = $this->roleRepository->all();

        return view('teams.create', compact('modules', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:teams,name',
            'slug' => 'required|unique:teams,slug',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->repository->create($request->all());

        return redirect()->route('teams.index')->with('message', 'Empresa creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $item)
    {
        $modules = $this->moduleRepository->all();

        return view('teams.show')->with(compact('item', 'modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Team $item)
    {
        $this->roleRepository->pushCriteria(new OnlyTeamRolesCriteria());
        $modules = $this->moduleRepository->all();
        $roles = $this->roleRepository->all();

        return view('teams.edit')->with(compact('item', 'modules', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Team $team)
    {
        $input = $request->except('_method');
        $this->repository->update($input, $team->id);

        return redirect()->route('teams.index')->with('success', 'Empresa editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team)
    {
        $this->repository->delete($team->id);
        return redirect()->route('teams.index');
    }


    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function changeStatus(Request $request, $id)
    {
        try {
            $item = $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        $input = $request->only('status');

        $item->status = $input['status'];
        $item->save();

        return redirect()->route('teams.show', $id)->with('success', 'Se ha cambiado el estado de la empresa correctamente.');
    }
}
