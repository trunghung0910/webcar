<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckAdminLogin
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
        if(Auth::check()){
            $user = Auth::user();
            if(($user->role == 1 ||$user->role == 2) && $user->active == 1)
                return $next($request);
            else
                Auth::logout();
            return redirect()->route('adminlogin');
        }
        else
            return redirect()->route('adminlogin');
    }
}
