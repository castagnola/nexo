<?php

namespace Nexo\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class SentinelAuth
{
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
            if (\Sentinel::inRole('admin') || \Sentinel::inRole('nexo-user')) {
                return $next($request);
            }

            $user = \Sentinel::getUser();


            if (!$user->teams->isEmpty()) {
                return redirect()->route('team', $user->teams->first()->slug);
            }

            return response('Forbidden.', 403);
        }

        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            return redirect()->guest('/login');
        }
    }
}


// 1 pliego,