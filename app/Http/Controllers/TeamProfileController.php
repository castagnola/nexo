<?php

namespace Nexo\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Nexo\Entities\Team;
use Nexo\Repositories\RoleRepository;

class TeamProfileController extends Controller
{
    public function __construct(RoleRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }

    public function getIndex(Team $team)
    {
        $profile = \Sentinel::getUser();
        return view('team.profile.show', compact('profile', 'team'));
    }

    public function getEdit(Team $team){
        $profile = \Sentinel::getUser();
        $contactTypes = collect(config('nexo.contactTypes'))->all();
        $returnUrl = url('profile');

        return view('team.profile.edit', compact('profile', 'team', 'contactTypes', 'returnUrl'));
    }
}
