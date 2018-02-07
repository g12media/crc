<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          $userType = Auth::user()->userType;
          if($userType == "admin"){
              return $next($request);
          }else if($userType == "super-admin"){
              return redirect("/superadmin");
          }else if($userType == "user"){
              return redirect("/user");
          }else{
              return redirect("/logout");
          }
        }

        return $next($request);
    }
}
