<?php

namespace App\Http\Middleware;
use Sentinel;
use Closure;

class AdminMiddleware
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
            return $next($request);
        else if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'user')
            return redirect('dashboard');
        else
            return redirect('/');
    }
}
