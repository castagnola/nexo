<?php

namespace Nexo\Http\Middleware;

use Closure;

class HasAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $user = \Sentinel::getUser();

        if (!$user->inRole('admin')) {
            if (!$user->hasAccess($permissions)) {
                if ($request->ajax()) {
                    return response('Forbidden.', 403);
                } else {
                    return redirect('/');
                }

            }
        }

        return $next($request);
    }

    /**
     * Grab the permissions from the request
     *
     * @param  \Illuminate\Http\Request $request
     * @return Array
     */
    private function getPermissions($request)
    {
        $actions = $request;

        return $actions['permissions'];
    }
}
