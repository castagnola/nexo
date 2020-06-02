<?php

namespace Nexo\Http\Middleware;

use Closure;

class App
{


    /**
     * The command bus.
     *
     * @array $bus
     */
    protected $languages = ['es','pt','en'];



    /**
     * Handle an incoming request.
     *
     * @param  Illuminate\Http\Request $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->get('lang');

        if(empty($lang)){
            $lang = $request->header('Lang');
        }


        if(empty($lang))
        {
            $lang = $request->getPreferredLanguage($this->languages);
        }


        app()->setLocale($lang);

        return $next($request);
    }

}