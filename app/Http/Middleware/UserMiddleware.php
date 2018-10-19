<?php

namespace App\Http\Middleware;
use Sentinel;

use Closure;

class UserMiddleware
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin')
            return redirect('admin/dashboard');
        else if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
            return $next($request);
        else
            return redirect('/');
    }
}
