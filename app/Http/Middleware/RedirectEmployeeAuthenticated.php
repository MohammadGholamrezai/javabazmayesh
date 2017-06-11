<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectEmployeeAuthenticated
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
        //If request comes from logged in user, he will
        //be redirect to home page.
        if (Auth::guard()->check()) {
            return redirect('/home');
        }

        //If request comes from logged in employee, he will
        //be redirected to employee's home page.
        if (Auth::guard('employee')->check()) {
            return redirect('/employee/home');
        }

        return $next($request);

    }
}
