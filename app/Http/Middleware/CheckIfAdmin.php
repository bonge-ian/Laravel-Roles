<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
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
        // check if user has admin role
        if (Auth::user()->hasAnyRoles(['admin', 'hr'])) {
            return $next($request);
        }

        return redirect('home');
    }
}
