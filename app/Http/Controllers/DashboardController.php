<?php

namespace Nexo\Http\Controllers;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Presenters\TeamPresenter;
use Nexo\Repositories\ModuleRepository;
use Nexo\Repositories\TeamRepository;
use Nexo\Transformers\TeamTransformer;

class DashboardController extends Controller
{

    public function index()
    {

        JavaScriptFacade::put([
            'documentTypes' => config('nexo.documentTypes'),
            'token' => \JWTAuth::fromUser($this->user()),
            'rights' => $this->getRights(),
            'roles' => $this->user()->roles->lists('slug')->toArray()
        ]);

        return view('dashboard');
    }
}