<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if($request->user() === null)
        {
            return redirect('/login');
        }

        $actions = $request->route()->getAction();
        $allowedRoles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRole($allowedRoles) || !$allowedRoles)
        {
            return $next($request);
        }

        return redirect('/login');
    }
}
