<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessUser
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
      if($userType == "user"){
          return redirect("/logout");
      }else if($userType == "call-center"){
          return redirect("/callCenter");
      }else if($userType == "super-adminn"){
          return redirect("/superadmin");
      }else if($userType == "admin"){
          return redirect("/administrator");
      }else{
          return redirect("/logout");
      }
    }
}
