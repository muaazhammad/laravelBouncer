<?php

namespace App\Http\Middleware;

use Closure;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class bouncerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $ability)
    {

if(Auth::check()) {
    switch ($ability) {

        case 'edit':
            if (Auth()->user()->can('edit')) {
                return $next($request);
            } else {
                return redirect('/unauthorized');
            }
            break;

        case 'create':
            if (Auth()->user()->can('create')) {
                return $next($request);
            } else {
                return redirect('/unauthorized');
            }
            break;

        case 'delete':
            if (Auth()->user()->can('delete')) {
                return $next($request);
            } else {
                return redirect('/unauthorized');
            }
            break;

        default:
            return redirect('/unauthorized');
    }
}
        return redirect('/home');

    }

}
