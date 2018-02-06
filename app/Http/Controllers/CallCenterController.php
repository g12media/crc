<?php

namespace App\Http\Controllers;
use Auth,Crypt,Image,DB;
use Illuminate\Http\Request;
use App\User;
use App\Calls;

class CallCenterController extends Controller{
    //
    public function dashboard(){
      $call = User::where('userType','=','user')->where('call_user','=','0')->get();

      $users = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.*')
        ->where('u.userType','=','user')
        ->get();


      return view('callCenter.dashboard')->with('users',$users)->with('call',$call);
    }
    public function callUser($id){
      $userId = Crypt::decrypt($id);
      $user = User::find($userId);
      return view('callCenter.call')->with('user',$user);
    }
    public function saveCall($id,Request $request){
      $userId = Crypt::decrypt($id);

      $call = new Calls;
      $call->status = $request->status;
      $call->answer = $request->answer;
      $call->description = $request->description;
      $call->userId = $userId;
      $call->save();

      return redirect('/callCenter');
    }
}
