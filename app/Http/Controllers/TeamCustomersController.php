<?php

namespace Nexo\Http\Controllers;

use Illuminate\Auth\Access\UnauthorizedException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Nexo\Entities\Criteria\Role\OnlyTeamRolesCriteria;
use Nexo\Entities\Customer;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Repositories\LocationCityRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;
use Gate;

/**
 * Class TeamCustomersController
 * @package Nexo\Http\Controllers
 */
class TeamCustomersController extends Controller
{
    /**
     * @var TeamRepository
     */
    /**
     * @var CustomerRepository|TeamRepository
     */
    /**
     * @var CustomerRepository|TeamRepository
     */
    /**
     * @var CustomerRepository|TeamRepository|UserValidator
     */
    protected $teamRepository, $repository, $roleRepository, $validator;


    /**
     * @param CustomerRepository $repository
     * @param TeamRepository $teamRepository
     * @param LocationCityRepository $cityRepository
     * @param UserValidator $validator
     */
    public function __construct(CustomerRepository $repository, TeamRepository $teamRepository, LocationCityRepository $cityRepository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->teamRepository = $teamRepository;
        $this->cityRepository = $cityRepository;
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
        return view('team.customers.list', compact('items', 'team'));
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
    public function edit(Team $team, Customer $item)
    {
        \Javascript::put([
            'customer' => $item,
            'addresses' => $item->addresses,
            'phones' => $item->phones,
            'customer_services_count' => $item->services->count(),
            'documentTypes' => config('nexo.documentTypes'),
        ]);

        $canDestroy = $this->user()->can('destroy', $item);

        return view('team.customers.edit', compact('team', 'item', 'canDestroy'));
    }


    /**
     * @param Team $team
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Team $team, Customer $customer)
    {
        try {
            $this->authorize('destroy', $customer);
        } catch (HttpException $e) {
            return redirect()->route('team.customers.edit', [$team->slug, $customer->id])->with('error', 'Lo sentimos, pero no tiene permisos para eliminar clientes.');
        }

        $this->repository->delete($customer->id);

        return redirect()->route('team.customers.index', $team->slug)->with('success', 'Cliente eliminado correctamente.');
    }
}
