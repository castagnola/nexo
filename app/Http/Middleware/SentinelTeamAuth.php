<?php

namespace Nexo\Http\Middleware;

use Closure;
use Nexo\Repositories\TeamRepository;

class SentinelTeamAuth
{

    protected $teamRepository;

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Sentinel::check()) {
            // Está logueado pero no pertenece a la empresa, fuera.
            $user = \Sentinel::getUser();
            $team = $request->route('teamSlug');

            if ($team->haveUser($user) || \Sentinel::inRole('admin')) {
                return $next($request);
            }
        }

        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->guest('login');
        }
    }
}
