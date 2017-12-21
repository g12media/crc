<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessAdmin
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
}
