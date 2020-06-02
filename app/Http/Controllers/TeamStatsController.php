<?php

namespace Nexo\Http\Controllers;

use Nexo\Entities\Team;
use Nexo\Http\Requests;

class TeamStatsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        \JavaScript::put([
            'teamCreatedAt' => $team->created_at
        ]);

        return view('team.stats.stats', compact('team'));
    }
}
