<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $user = \auth()->user();
        if ($user->email != "calwann@gmail.com") {
            return \redirect('/');
        }
        return $next($request);
    }
}
