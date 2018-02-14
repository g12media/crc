<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/redirect';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/redirect');
        }else{
          \Session::flash('error_message','Datos Incorrectos! Intentalo nuevamente..');
          return redirect('/login');
        }
    }
    public function redirect(Request $request){
      $userType = Auth::user()->userType;
      if($userType == "admin"){
          return redirect("/administrator");
      }else if($userType == "super-admin"){
          return redirect("/superadmin");
      }else if($userType == "call-center"){
          return redirect("/callCenter");
      }else if($userType == "user"){
          return redirect("/logout");
      }else{
          return redirect("/logout");
      }
    }
    public function logout(){
      Auth::logout();
      return redirect('/login');
    }
}
