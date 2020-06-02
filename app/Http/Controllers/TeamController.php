<?php

namespace Nexo\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Nexo\Contracts\PushNotification;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Presenters\TeamPresenter;
use Nexo\Repositories\ModuleRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Transformers\TeamTransformer;
use Hashids;

class TeamController extends Controller
{
    protected $repository, $validator;

    public function __construct(TeamRepository $repository, ModuleRepository $moduleRepository, TeamTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param Team $team
     * @return \Illuminate\View\View
     */
    public function index(Team $team)
    {
        $item = $team;

        $teamIdEncoded = Hashids::encode($team->id);

        \Javascript::put([
            //'api_url' => url('api/account/' . $team->slug) . '/',
            'team_id' => $teamIdEncoded,
            'documentTypes' => config('nexo.documentTypes'),
            'token' => \JWTAuth::fromUser($this->user()),
            'rights' => $this->getRights(),
            'roles' => $this->user()->roles->lists('slug')->toArray()
        ]);


        $templateUrl = url("{$team->slug}/ui/template") . '?name=';

        return view('team.dashboard', compact('team', 'item', 'teamIdEncoded', 'templateUrl'));
    }

    /**
     * @param Team $team
     * @return \Illuminate\View\View
     */
    public function getConfiguration(Team $team)
    {
        return view('team.configuration', compact('team'));
    }

    /**
     *
     */
    public function postConfiguration(Request $request, Team $team)
    {
        $this->repository->update($request->all(), $team->id);
        return redirect()->route('team.configuration', $team->slug)->with('success', 'Configuración cambiada correctamente.');
    }
}
