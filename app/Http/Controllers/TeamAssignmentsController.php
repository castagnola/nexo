<?php

namespace Nexo\Http\Controllers;

use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Entities\Service;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceTypeRepository;

class TeamAssignmentsController extends Controller
{
    protected $repository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        return view('team.assignments.assignment', compact('team'));
    }
}