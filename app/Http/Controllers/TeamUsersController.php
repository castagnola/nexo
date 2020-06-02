<?php

namespace Nexo\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Criteria\Role\OnlyTeamRolesCriteria;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Repositories\TeamRoleLimitRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

class TeamUsersController extends Controller
{
    protected $teamRepository, $repository, $roleRepository, $validator;


    public function __construct(UserRepository $repository, TeamRepository $teamRepository, RoleRepository $roleRepository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->teamRepository = $teamRepository;
        $this->roleRepository = $roleRepository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        $items = $this->repository->allByTeamId($team->id);
        return view('team.users.list', compact('items', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Team $team)
    {
        if (!$team->canCreateUsers()) {
            abort(404);
        }

        $this->roleRepository->pushCriteria(new OnlyTeamRolesCriteria());
        $roles = $this->roleRepository->all();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = route('users.index');

        return view('team.users.create', compact('roles', 'contactTypes', 'returnUrl', 'team'));
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
        $this->makeValidator($request, 'create');
        $user = $this->repository->create($input);
        $user->teams()->attach($team->id);
        return redirect()->route('users.show', $user->id)->with('message', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, User $item)
    {
        return view('team.users.show')->with(compact('team', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Team $team, User $item)
    {
        $this->roleRepository->pushCriteria(new OnlyTeamRolesCriteria());
        $roles = $this->roleRepository->all();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = route('users.show', $item);

        return view('users.edit')->with(compact('item', 'roles', 'returnUrl', 'contactTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, Team $team, User $user)
    {
        $this->makeValidator($request, 'update', $user->id);

        try {
            $this->repository->update($request->except('_method'), $user->id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        $returnUrl = $request->get('return_url');
        $message = 'Usuario editado correctamente';

        if (!empty($returnUrl)) {
            return redirect($returnUrl)->with('success', $message);
        } else {
            return redirect()->route('teams.index')->with('success', $message);
        }
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

    /**
     * Cambiar el estado del usuario
     *
     * @param Request $request
     * @param Team $team
     * @param User $user
     * return $this|\Illuminate\Http\RedirectResponse
     */
    public function changeStatus(Request $request, Team $team, User $user)
    {
        $status = $request->get('status');
        $returnUrl = $request->get('return_url');

        if ($this->repository->changeStatus($user, $status)) {
            return redirect($returnUrl)->with('success', 'El estado del usuario ha sido cambiado correctamente.');
        }

        return redirect()->back()->withErrors('Hubo un error al cambiar el estado del usuario.');
    }
}
