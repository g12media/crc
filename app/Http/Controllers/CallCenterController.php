<?php

namespace App\Http\Controllers;
use Auth,Crypt,Image,DB;
use Illuminate\Http\Request;
use App\User;
use App\Calls;

class CallCenterController extends Controller{
    //
    public function dashboard(){
      $users = User::all();
      return view('callCenter.dashboard')->with('users',$users);
    }
    public function callUser($id){
      $userId = Crypt::decrypt($id);
      $user = User::find($userId);
      return view('callCenter.call')->with('user',$user);
    }
    public function saveCall($id){
      $call = new Calls
    }
}
