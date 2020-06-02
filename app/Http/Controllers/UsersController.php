<?php

namespace Nexo\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Http\Requests;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

/*
 * Criterias
 */
use Nexo\Entities\Criteria\User\OnlySystemCriteria;
use Nexo\Entities\Criteria\Role\OnlySystemRolesCriteria;

use Validator;

class UsersController extends Controller
{
    protected $repository, $validator, $roleRepository;

    public function __construct(UserRepository $repository, RoleRepository $roleRepository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->repository->pushCriteria(new OnlySystemCriteria);
        $items = $this->repository->all();
        $createUrl = route('users.create');


        return view('users.list', compact('items', 'roles', 'createUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->roleRepository->pushCriteria(new OnlySystemRolesCriteria());
        $roles = $this->roleRepository->all();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = route('users.index');

        return view('users.create', compact('roles', 'contactTypes', 'returnUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->makeValidator($request, 'create');
        $user = $this->repository->create($request->all());

        $message = 'Usuario creado correctamente.';

        if ($request->exists('team_id')) {
            $user->teams()->attach($request->get('team_id'));

            return redirect()->route('teams.users.index', $request->get('team_id'))->with('message', $message);
        }

        return redirect()->route('users.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(User $item)
    {
        return view('users.show')->with(compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(User $item)
    {
        $this->roleRepository->pushCriteria(new OnlySystemRolesCriteria());
        $roles = $this->roleRepository->all();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = route('users.show', $item->id);

        return view('users.edit')->with(compact('item', 'roles', 'returnUrl', 'contactTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, User $item)
    {
        $this->makeValidator($request, 'update', $item->id);

        try {
            $this->repository->update($request->except('_method'), $item->id);
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


    public function changeStatus(Request $request, $id)
    {
        try {
            $user = $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        $status = $request->get('status');
        $returnUrl = $request->get('return_url');

        if ($this->repository->changeStatus($user, $status)) {
            return redirect($returnUrl)->with('success', 'El estado del usuario ha sido cambiado correctamente.');
        }

        return redirect()->back()->withErrors('Hubo un error al cambiar el estado del usuario.');
    }


}
