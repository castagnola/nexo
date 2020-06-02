<?php

namespace Nexo\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nexo\Repositories\TeamRepository;

class TeamMiddleware
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
        $teamSlug = $request->route('team');

        try {
            $team = $this->teamRepository->findBySlug($teamSlug);
        } catch (ModelNotFoundException $e) {
            // abort(404);
        }

        return $next($request);
    }
}
