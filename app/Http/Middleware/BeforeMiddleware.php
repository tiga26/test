<?php

namespace App\Http\Middleware;

use Closure;
use App\Libraries\StripTag;

class BeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        StripTag::globalXssClean($request);

        return $next($request);
    }
}
