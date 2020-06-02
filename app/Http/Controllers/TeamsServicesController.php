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

class TeamsServicesController extends Controller
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
}
