<?php

namespace Nexo\Http\Middleware;

use Closure;

class SentinelRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if (!\Sentinel::inRole($role)) {
            if ($request->ajax()) {
                return response('Forbidden.', 403);
            } else {
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }
}
