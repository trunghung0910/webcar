<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
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
        if(Auth::guest()){
            return redirect()->route('frontend.get.login')->with('alert_user','Bạn cần đăng nhập để thực hiện chức năng này');
        }
        return $next($request);
    }
}
