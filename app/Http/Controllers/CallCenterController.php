<?php

namespace App\Http\Controllers;
use Auth,Crypt,Image,DB;
use Illuminate\Http\Request;
use App\User;
use App\Calls;

class CallCenterController extends Controller{
    //
    public function dashboard(){
      $user = Auth::user();

      $usersAssign = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->select('u.*')
        ->where('ccu.callCenterId','=',$user->id)
        ->where('u.call_user','=',0)
        ->get();

      $usersAssignTotal = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->select('u.*')
        ->where('ccu.callCenterId','=',$user->id)
        ->count();

      $answeredcalls = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('ccu.callCenterId','=',$user->id)
        ->where('c.status','=',1)
        ->get();

      $answeredcallsTotal = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('ccu.callCenterId','=',$user->id)
        ->where('c.status','=',1)
        ->count();

      $unansweredcalls = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer','c.id as callId')
        ->where('ccu.callCenterId','=',$user->id)
        ->where('c.status','=',0)
        ->get();

      $unansweredcallsTotal = DB::table('users as u')
        ->join('callcenterUsers as ccu', 'u.id', '=', 'ccu.userId')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer','c.id as callId')
        ->where('ccu.callCenterId','=',$user->id)
        ->where('c.status','=',0)
        ->count();

      $users = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('u.userType','=','user')
        ->get();

      return view('callCenter.dashboard')
      ->with('users',$users)
      ->with('usersAssign',$usersAssign)
      ->with('answeredcalls',$answeredcalls)
      ->with('unansweredcalls',$unansweredcalls)
      ->with('usersAssignTotal',$usersAssignTotal)
      ->with('answeredcallsTotal',$answeredcallsTotal)
      ->with('unansweredcallsTotal',$unansweredcallsTotal);
    }/*
    public function callUser($id){
      $userId = Crypt::decrypt($id);
      $user = User::find($userId);
      return view('callCenter.call')->with('user',$user);
    }*/
    public function saveCall(Request $request){

      $user = User::find($request->userIdCall);
      $user->call_user = 1;
      $user->save();

      $call = new Calls;
      $call->status = $request->status;
      $call->answer = $request->answer;
      $call->description = $request->description;
      $call->userId = $request->userIdCall;
      $call->save();

      return redirect('/callCenter');
    }

    public function detailsCall($id){
      $userId = Crypt::decrypt($id);
      $users = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('u.id','=',$userId)
        ->get();
      return view('callCenter.details')->with('users',$users);
    }
    public function editCall($id){
      $userId = Crypt::decrypt($id);
      $users = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer','c.id as callId')
        ->where('u.id','=',$userId)
        ->get();
      //return $users;
      return view('callCenter.editCall')->with('users',$users);
    }
    public function getUsers($id){
      $user = User::find($id);
      return $user;
    }
    public function updateCall($id,Request $request){
      $call = Calls::find($request->callId);
      $call->status = $request->status;
      $call->answer = $request->answer;
      $call->description = $request->description;
      $call->save();

      return redirect('/callCenter');
    }
}
