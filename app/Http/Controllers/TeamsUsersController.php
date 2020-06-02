<?php

namespace Nexo\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Entities\Criteria\Role\OnlyTeamRolesCriteria;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\RoleRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Validator;

class TeamsUsersController extends Controller
{
    protected $repository;
    protected $teamRepository;
    protected $roleRepository;
    protected $validator;

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
        $items = $this->repository->scopeQuery(function ($query) use ($team) {
            return $query->whereHas('teams', function ($query) use ($team) {
                $query->where('id', $team->id);
            });
        })->all();

        $createUrl = route('teams.users.create', $team);

        return view('users.list', compact('items', 'teamId', 'team', 'createUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Team $team)
    {
        $this->roleRepository->pushCriteria(new OnlyTeamRolesCriteria());
        $roles = $this->roleRepository->all();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = route('users.index');

        return view('users.create', compact('roles', 'contactTypes', 'returnUrl'))->with('teamId', $team->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Team $team)
    {
        $this->makeValidator($request, 'create');
        $user = $this->repository->create($request->all());

        return redirect()->route('teams.users.index', [$team->slug, $user->id])->with('message', 'Usuario creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, User $item)
    {
        return view('users.show')->with(compact('team', 'item'));
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
        $returnUrl = route('teams.users.show', [$team, $item]);

        return view('users.edit')->with(compact('item', 'roles', 'returnUrl', 'contactTypes', 'team'));
    }
}
