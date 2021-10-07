<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminPermission
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
            if($user->role == 1 )
                return $next($request);
            else
                return redirect()->back()->with('alert','Bạn không có quyền để thực hiện chức năng này');
        }
        else
            return redirect()->back()->with('alert','Bạn không có quyền để thực hiện chức năng này');
    }
}
