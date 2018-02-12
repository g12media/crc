<?php

namespace App\Http\Controllers;

use Auth,Crypt,Image,DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Properties;
use App\Roles;
use App\UserRoles;
use App\Documents;
use App\OwnersProperties;
use App\PropertyDocuments;
use App\Bussines;
use App\Calls;
use App\Payments;
use App\callcenterUsers;
use Illuminate\Http\Request;


class AdministratorController extends Controller
{
    //
    public function dashboard(){
      return redirect('administrator/users/');
    }

    public function checkUser(Request $request){
        $identification = $request->identification;
        $count = User::where('identification', '=', $identification)->count();
        if($count == 0){
          return json_encode(array("valid" => true));
        }else{
          return json_encode(array("valid" => false));
        }
    }

    public function votantesValidate(Request $request){
      $user = User::where('identification', '=', $request->identification)->count();
      if ($user != 0) {
        $u = User::where('identification', '=', $request->identification)->firstOrFail();
        return redirect('/formulario/contacts/'.date('Y').'-'.$u->id.'-'.date('Hms'));
      }else {
        return redirect('/votantes');
      }
    }

    public function getUser($id){
      $user = User::find($id);
      return $user;
    }

    public function updateUsers(Request $request){
        $leader = $request->leader;

        $User = User::find($request->userId);
        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
        $User->neighborhood = $request->neighborhood;
        $User->username = $request->identificacion;
        $User->password = bcrypt($request->identificacion);
        $User->save();

        return redirect('administrator/users/'.date('Y').'-'.$leader.'-'.date('Hms'));
    }

    public function updateUsers12(Request $request){
        $leader = $request->leader;
        $User = User::find($request->userId);
        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
        $User->neighborhood = $request->neighborhood;
        $User->username = $request->identificacion;
        $User->password = bcrypt($request->identificacion);
        $User->save();

        return redirect('administrator/users/');
    }

    public function deleteUser12(Request $request){
      $identification = $request->identification;
      $userId = $request->userId;
      $leader = date('Y').'-'.$request->leader.'-'.date('Hms');

      $count = User::where('identification', '=', $identification)->where('id', '=', $userId)->count();
      if($count == 0){
        return redirect('administrator/users/');
      }else{
        //Delete Users
        DB::table('users')->where('userId', '=', $userId)->delete();
        $user = User::find($userId);
        $user->delete();
        return redirect('administrator/users/');
      }
    }

    public function deleteUser(Request $request){
      $identification = $request->identification;
      $userId = $request->userId;
      $leader = date('Y').'-'.$request->leader.'-'.date('Hms');

      $count = User::where('identification', '=', $identification)->where('id', '=', $userId)->count();
      if($count == 0){
        return redirect('administrator/users/'.$leader);
      }else{
        //Delete Users
        DB::table('users')->where('userId', '=', $userId)->delete();
        $user = User::find($userId);
        $user->delete();
        return redirect('administrator/users/'.$leader);
      }
    }

    public function getUsers(){
        $user = Auth::user();



        $usersGeneral = User::where('leaderPrincipal',$user->id)->where('level',12)->get();

        $usersHeadquarters = User::where('contactType','sede')->get();

        $usersTotal = User::all()->count();
        $usersTotalCount = $usersTotal - 1;



        if($user->level == 1){
          //Contactos Generales
          $contacts = User::where('contactType','contacto')->count();
          //Valientes Generales
          $valientes = User::where('contactType','ministerio')->count();

          $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
          $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();

        }else{
          if($user->contactType == 'ministerio'){
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();

            $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
            $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();

          }else{
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','sede')->where('id','!=',$user->id)->count();

            $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','sede')->get();
            $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','sede')->get();

          }

        }





        return view('admin.users.index_new')
        ->with('usersGeneral',$usersGeneral)
        ->with('usersMen',$usersMen)
        ->with('usersWomen',$usersWomen)
        ->with('user',$user)
        ->with('usersHeadquarters',$usersHeadquarters)
        ->with('usersTotalCount',$usersTotalCount)
        ->with('contacts',$contacts)
        ->with('valientes',$valientes);

    }

    public function votantes(){
      return view('admin.users.votantes');
    }
    public function contactos(){
      return view('admin.users.votante_new');
    }

    public function contactosValidate(Request $request){
      $User = new User;
      $User->userType = 'user';
      $User->contactType = 'contacto';
      $User->identification = $request->identification;
      $User->name = $request->name;
      $User->lastName = $request->lastName;
      $User->gender = $request->gender;
      $User->phone = $request->phone;
      $User->email = $request->email;
      $User->department = $request->department;
      $User->city = $request->city;
      $User->neighborhood = $request->neighborhood;
      $User->level = 0;
      $User->leaderPrincipal = 1;
      $User->userId = 1;
      $User->username = $request->identification;
      $User->password = bcrypt($request->identification);
      $User->save();
      return redirect('/contactos');
    }

    public function getUsersByProfile($userId){

      $userIdExplode = $array = explode("-", $userId);
      $user = User::find($userIdExplode[1]);
      if($user->contactType == 'sede'){
        $users = User::where('userId',$user->id)->where('id','!=',$user->id)->where('contactType','sede')->get();
      }else{
        $users = User::where('userId',$user->id)->where('id','!=',$user->id)->where('contactType','ministerio')->get();
      }

      $usersContact = User::where('userId',$user->id)->where('contactType','contacto')->get();



      /* Count valientes en Linea*/
      $level1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->count();
      if($level1 != 0){
        $usuarios = $level1;
        $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->get();
        foreach($usuarioslevel1 as $ul1) {
          $level2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->count();
          if ($level2 != 0) {
            $usuarios = $usuarios + $level2;
            $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->get();
            foreach($usuarioslevel2 as $ul2){
              $level3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->count();
              if ($level3 != 0) {
                $usuarios = $usuarios + $level3;
                $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->get();
                foreach($usuarioslevel3 as $ul3){
                  $level4 = User::where('userId','=',$ul3->id)->where('contactType','ministerio')->count();
                  $usuarios = $usuarios + $level4;
                }
              }
            }
          }

        }
      }else {
        $usuarios = 0;
      }

      /* Count contactos en linea */
      $level1 = User::where('userId','=',$user->id)->where('contactType','contacto')->count();

      $usuarios_contacto = $level1;
      $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','contacto')->get();
      foreach($usuarioslevel1 as $ul1) {
        $level2 = User::where('userId','=',$ul1->id)->where('contactType','contacto')->count();
        if ($level2 != 0) {
          $usuarios_contacto = $usuarios + $level2;
          $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','contacto')->get();
          foreach($usuarioslevel2 as $ul2){
            $level3 = User::where('userId','=',$ul2->id)->where('contactType','contacto')->count();
            if ($level3 != 0) {
              $usuarios_contacto = $usuarios + $level3;
              $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','contacto')->get();
              foreach($usuarioslevel3 as $ul3){
                $level4 = User::where('userId','=',$ul3->id)->where('contactType','contacto')->count();
                $usuarios_contacto = $usuarios + $level4;
              }
            }
          }
        }
      }



    if($user->level == 12){
      $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
      //Valientes Generales
      $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();
    }else{
      $contacts = $usuarios_contacto;
      $valientes = $usuarios;
    }



      return view('admin.users.profile')
      ->with('usuarios',$usuarios)
      ->with('usuarios_contacto',$usuarios_contacto)
      ->with('valientes',$valientes)
      ->with('contacts',$contacts)
      ->with('users',$users)
      ->with('usersContact',$usersContact)

      ->with('user',$user);


    }

    public function addUsers(){
      return view('admin.users.add');
    }

    public function saveHeadquarter(Request $request){
        $user_principal = Auth::user();
        $User = new User;
        $User->userType = 'admin';
        $User->contactType = 'sede';
        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->city = $request->city;
        $User->department = $request->department;
        $User->leaderPrincipal = 1;
        $User->level = 12;
        $User->userId = 1;
        $User->username = $request->username;
        $User->password = bcrypt($request->password);
        $User->save();

        return redirect('administrator/users/');
    }

    public function saveUsers(Request $request){
        $user_principal = Auth::user();
        $User = new User;
        $User->userType = 'user';
        $User->contactType = 'ministerio';
        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        if($request->type == 'sede'){
          $User->contactType = 'sede';
          $User->department = $request->department;
          $User->city = $request->city;
        }else{
          $User->contactType = 'ministerio';
          $User->location = $request->location;
          $User->locationVote = $request->locationVote;
        }
        $User->neighborhood = $request->neighborhood;
        $User->leaderPrincipal = $user_principal->id;
        $User->level = 144;
        $User->userId = $user_principal->id;
        $User->username = $request->identificacion;
        $User->password = bcrypt($request->identificacion);
        $User->save();

        return redirect('administrator/users/');
    }

    public function saveUserProfile(Request $request){
        /*$user_principal = Auth::user();
        $userLeader = $this->getLevelByLeader($request->leader);*/

        $userIdExplode = $array = explode("-", $request->leader);
        $userLeader = $this->getLevelByLeader($request->leader);
        $user_principal = Auth::user();


        $User = new User;
        $User->userType = 'user';

        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        if($request->type == 'sede'){
          $User->contactType = 'sede';
          $User->department = $request->department;
          $User->city = $request->city;
        }else{
          $User->contactType = 'ministerio';
          $User->location = $request->location;
          $User->locationVote = $request->locationVote;
        }
        $User->neighborhood = $request->neighborhood;
        if($userLeader->level == 144){
          $User->level = 1728;
        }else if($userLeader->level == 1728){
          $User->level = 20736;
        }else if($userLeader->level == 20736){
          $User->level = 248832;
        }else if($userLeader->level == 248832){
          $User->level = 2985984;
        }else{
          $User->level = 0;
        }

        $User->leaderPrincipal = $user_principal->id;
        $User->userId = $userIdExplode[1];
        $User->username = $request->identificacion;
        $User->password = bcrypt($request->identificacion);
        $User->save();

        return redirect('administrator/users/'.$request->leader);


    }

    public function getLevelByLeader($leaderId){
      $userIdExplode = $array = explode("-", $leaderId);
      $user = User::find($userIdExplode[1]);
      return $user;
    }

    public function getFormRegister($userId){
      $userIdExplode = $array = explode("-", $userId);
      $user = User::find($userIdExplode[1]);
      $users = User::where('userId',$userIdExplode[1])->get();
      return view('admin.users.register')->with('userId',$userId)->with('user',$user)->with('users',$users);
    }

    public function getFormRegisterContacts($userId){
      $userIdExplode = $array = explode("-", $userId);
      $user = User::find($userIdExplode[1]);
      $users = User::where('userId',$userIdExplode[1])->where('contactType','contacto')->get();
      return view('admin.users.register_contacts')->with('userId',$userId)->with('user',$user)->with('users',$users);
    }

    public function saveFormRegisterContacts(Request $request){

      //2018-6927-190240
      $userIdExplode = $array = explode("-", $request->leader);
      //Get Direct Leader
      $userLeader = User::find($userIdExplode[1]);

      $user_principal = User::find($userLeader->leaderPrincipal);



      $User = new User;
      $User->userType = 'user';
      $User->contactType = 'contacto';
      $User->identification = $request->identification;
      $User->name = $request->name;
      $User->lastName = $request->lastName;
      $User->gender = $request->gender;
      $User->phone = $request->phone;
      $User->email = $request->email;
      if($request->type == 'sede'){
        $User->department = $request->department;
        $User->city = $request->city;
      }else{
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
      }
      $User->neighborhood = $request->neighborhood;
      $User->level = 0;

      if($user_principal->id == 1){
        $User->leaderPrincipal = $userLeader->id;
      }else{
        $User->leaderPrincipal = $user_principal->id;
      }


      $User->userId = $userIdExplode[1];
      $User->username = $request->identification;
      $User->password = bcrypt($request->identification);
      $User->save();
      return redirect('/formulario/contacts/'.$request->leader);
    }

    public function saveFormRegister(Request $request){

      $userIdExplode = $array = explode("-", $request->leader);

      $userLeader = $this->getLevelByLeader($request->leader);
      $user_principal = User::find($userLeader->leaderPrincipal);
      $User = new User;
      $User->userType = 'user';

      $User->identification = $request->identification;
      $User->name = $request->name;
      $User->lastName = $request->lastName;
      $User->gender = $request->gender;
      $User->phone = $request->phone;
      $User->email = $request->email;

      if($request->type == 'sede'){
        $User->contactType = 'sede';
        $User->department = $request->department;
        $User->city = $request->city;
      }else{
        $User->contactType = 'ministerio';
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
      }
      $User->neighborhood = $request->neighborhood;
      if($userLeader->level == 12){
        $User->level = 144;
      }else if($userLeader->level == 144){
        $User->level = 1728;
      }else if($userLeader->level == 1728){
        $User->level = 20736;
      }else if($userLeader->level == 20736){
        $User->level = 248832;
      }else if($userLeader->level == 248832){
        $User->level = 2985984;
      }else{
        $User->level = 0;
      }
      $User->leaderPrincipal = $user_principal->id;
      $User->userId = $userIdExplode[1];
      $User->username = $request->identification;
      $User->password = bcrypt($request->identification);
      $User->save();
      return redirect('/formulario/'.$request->leader);
    }
    public function callCenter(){
      $users = User::where('userType','call-center')->get();

      $ministry = User::where('level','12')->get();


      $answeredcalls = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('c.status','=',1)
        ->get();

      $unansweredcalls = DB::table('users as u')
        ->join('Calls as c', 'u.id', '=', 'c.userId')
        ->select('u.*','c.status','c.description','c.answer')
        ->where('c.status','=',0)
        ->get();

      return view('admin.users.callcenter')
      ->with('users',$users)
      ->with('callcenterUsers',new callcenterUsers())
      ->with('ministry',$ministry)
      ->with('answeredcalls',$answeredcalls)
      ->with('unansweredcalls',$unansweredcalls);
    }
    public function saveUserCallcenter(Request $request){
      $User = new User;
      $User->userType = 'call-center';
      $User->contactType = 'call-center';
      $User->name = $request->name;
      $User->lastName = $request->lastName;
      $User->userId = $request->ministry_date;
      $User->leaderPrincipal = $request->ministry_date;
      $User->username = $request->identification;
      $User->password = bcrypt($request->identification);
      $User->save();

      return redirect('/administrator/callcenter');
    }

    public function saveAssignUser(Request $request){



        $userAssign = User::find($request->userIdAssign);

          //Ministerio
          $users = DB::table('users')->where('userType','=','user')->where('contactType','=','contacto')->where('assign_user','=',0)->where('leaderPrincipal','=',$userAssign->leaderPrincipal)->take($request->random)->get();
          foreach ($users as $u){
            $callcenterUsers = new callcenterUsers;
            $callcenterUsers->userId = $u->id;
            $callcenterUsers->callCenterId = $request->userIdAssign;
            $callcenterUsers->save();

            $user = User::find($u->id);
            $user->assign_user = 1;
            $user->save();
          }

        return redirect('/administrator/callcenter');
    }


    public function repairDatabase(){

      $users = User::all()->get();
      foreach($users as $user){

          $userDirect = $user->userId;

      }

    }

}
