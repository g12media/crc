<?php

namespace App\Http\Controllers;

use Auth,Crypt,Image,DB,Excel;
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
use App\candidateHeadquarter;
use Illuminate\Http\Request;


class AdministratorController extends Controller
{
    //

    private $data;
    private $count;
    private $count_exist;
    private $number_export_exist;
    private $userType;
    private $leaderId;

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

        $usersGeneral = User::where('leaderPrincipal',$user->id)->where('level',12)->where('contactType','ministerio')->get();

        $usersHeadquarters = User::where('contactType','sede')->where('userType','admin')->get();

        $usersTotal = User::all()->count();
        $usersTotalCount = $usersTotal - 1;


        //Informacion Pastor Cesar
        if($user->level == 1){
          //Contactos Generales
          $contacts = User::where('contactType','contacto')->count();
          //Valientes Generales
          $valientes = User::where('contactType','ministerio')->count();

          //Equipo Principal
          $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
          $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();

        }else{

          //Informacion Lideres/ Valientes Principales
          if($user->contactType == 'ministerio'){
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();
            //Equipo Principal de Valientes
            $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
            $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();

          }else{
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','sede')->where('id','!=',$user->id)->count();
            //Equipo Principal de Valientes (Sede)
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
      if($user->contactType == 'ministerio'){
        $level1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->count();
      }else if($user->contactType == 'sede'){
        $level1 = User::where('userId','=',$user->id)->where('contactType','sede')->count();
      }else{
        $level1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->count();
      }


      if($level1 != 0){

        $usuarios = $level1;
        if($user->contactType == 'ministerio'){
          $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->get();
        }else if($user->contactType == 'sede'){
          $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','sede')->get();
        }else{
          $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->get();
        }

        foreach($usuarioslevel1 as $ul1) {

            if($user->contactType == 'ministerio'){
              $level2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->count();
            }else if($user->contactType == 'sede'){
              $level2 = User::where('userId','=',$ul1->id)->where('contactType','sede')->count();
            }else{
              $level2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->count();
            }
            $usuarios = $usuarios + $level2;

            if($user->contactType == 'ministerio'){
              $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->get();
            }else if($user->contactType == 'sede'){
              $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','sede')->get();
            }else{
              $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->get();
            }


            foreach($usuarioslevel2 as $ul2){
                if($user->contactType == 'ministerio'){
                  $level3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->count();
                }else if($user->contactType == 'sede'){
                  $level3 = User::where('userId','=',$ul2->id)->where('contactType','sede')->count();
                }else{
                  $level3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->count();
                }

                $usuarios = $usuarios + $level3;
                if($user->contactType == 'ministerio'){
                  $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->get();
                }else if($user->contactType == 'sede'){
                  $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','sede')->get();
                }else{
                  $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->get();
                }

                foreach($usuarioslevel3 as $ul3){
                  if($user->contactType == 'ministerio'){
                    $level4 = User::where('userId','=',$ul3->id)->where('contactType','ministerio')->count();
                  }else if($user->contactType == 'sede'){
                    $level4 = User::where('userId','=',$ul3->id)->where('contactType','sede')->count();
                  }else{
                    $level4 = User::where('userId','=',$ul3->id)->where('contactType','ministerio')->count();
                  }

                  $usuarios = $usuarios + $level4;
                }

            }


        }
      }else {
        $usuarios = 0;
      }

      /* Count contactos en linea */
      $level1 = User::where('userId','=',$user->id)->where('contactType','contacto')->count();

      $usuarios_contacto = $level1;
      //Obtener usuarios valientes ara extraer sus contactos
      if($user->contactType == 'ministerio'){
        $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->get();
      }else if($user->contactType == 'sede'){
        $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','sede')->get();
      }else{
        $usuarioslevel1 = User::where('userId','=',$user->id)->where('contactType','ministerio')->get();
      }

      foreach($usuarioslevel1 as $ul1) {
          $level2 = User::where('userId','=',$ul1->id)->where('contactType','contacto')->count();
          $usuarios_contacto = $usuarios_contacto + $level2;

          if($ul1->contactType == 'ministerio'){
            $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->get();
          }else if($ul1->contactType == 'sede'){
            $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','sede')->get();
          }else{
            $usuarioslevel2 = User::where('userId','=',$ul1->id)->where('contactType','ministerio')->get();
          }


          foreach($usuarioslevel2 as $ul2){
            $level3 = User::where('userId','=',$ul2->id)->where('contactType','contacto')->count();
              $usuarios_contacto = $usuarios_contacto + $level3;

              if($ul2->contactType == 'ministerio'){
                $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->get();
              }else if($ul2->contactType == 'sede'){
                $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','sede')->get();
              }else{
                $usuarioslevel3 = User::where('userId','=',$ul2->id)->where('contactType','ministerio')->get();
              }

              foreach($usuarioslevel3 as $ul3){
                $level4 = User::where('userId','=',$ul3->id)->where('contactType','contacto')->count();
                $usuarios_contacto = $usuarios_contacto + $level4;
              }

          }

      }



    if($user->level == 12){
      if($user->contactType == 'sede'){
        $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
        $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','sede')->where('id','!=',$user->id)->count();
      }else{
        $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
        $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();
      }

    }else{
      $contacts = $usuarios_contacto;
      $valientes = $usuarios;
    }
      $userLogin = Auth::user();
      return view('admin.users.profile')
      ->with('usuarios',$usuarios)
      ->with('usuarios_contacto',$usuarios_contacto)
      ->with('valientes',$valientes)
      ->with('contacts',$contacts)
      ->with('users',$users)
      ->with('usersContact',$usersContact)
      ->with('userLogin',$userLogin)
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
      if($user->contactType == 'sede'){
        $users = User::where('userId',$userIdExplode[1])->where('contactType','sede')->get();
      }else{
        $users = User::where('userId',$userIdExplode[1])->where('contactType','ministerio')->get();
      }
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
    public function getHeadquarter($id){
      $headquarter = User::find($id);
      return $headquarter;
    }
    public function loadMasiveFile(Request $request){


          $this->leaderId = $request->leader;
          $usuario = User::find($this->leaderId);
          $this->userType = $usuario->contactType;
          $this->data = array();

          $this->count = 0;
          $this->count_exist = 0;

          if ($request->file('fileData')->isValid()) {
              $file = $request->fileData;
              Excel::load($file, function($reader) {
                $this->i = 0;
                 $reader->each(function($sheet) {
                    //Add sede
                    if($this->userType == "sede"){

                      $userCount = User::where('identification',$sheet->documento)->count();
                      //Verifica que el usuario no exista en la base de datos
                      if($sheet->documento == "" || $userCount == 0){
                        $User = new User;
                        $User->userType = 'user';
                        $User->contactType = 'contacto';
                        $User->identification = $sheet->documento;
                        $User->name = $sheet->nombres;
                        $User->lastName = $sheet->apellidos;
                        $User->gender = $sheet->genero;
                        $User->phone = $sheet->celular;
                        $User->email = $sheet->email;
                        $User->level = 0;
                        $User->leaderPrincipal = $this->leaderId;
                        $User->userId = $this->leaderId;
                        $User->department = $sheet->departamento;
                        $User->city = $sheet->ciudad;
                        $User->neighborhood = $sheet->barrio;
                        $User->username = rand(10000,1000000000);
                        $User->password = bcrypt(rand(10,1000000));
                        $User->save();
                        $this->count++;
                      }else{
                        $this->count_exist++;
                      }
                    }else{
                      $user_exist = User::where('identification',$sheet->valiente)->count();
                      if($user_exist > 0){
                        $userData = User::where('identification',$sheet->valiente)->take(1)->get();
                        foreach ($userData as $u) {
                          $userCount = User::where('identification',$sheet->documento)->count();
                          //Verifica que el usuario no exista en la base de datos
                          if($userCount == 0){
                            $User = new User;
                            $User->userType = 'user';
                            $User->contactType = 'contacto';
                            $User->identification = $sheet->documento;
                            $User->name = $sheet->nombres;
                            $User->lastName = $sheet->apellidos;
                            $User->gender = $sheet->genero;
                            $User->phone = $sheet->celular;
                            $User->email = $sheet->email;
                            $User->level = 0;
                            $User->leaderPrincipal = $leaderId;
                            $User->userId = $u->id;
                            $User->location = $sheet->localidad_vive;
                            $User->locationVote = $sheet->localidad_vota;
                            $User->neighborhood = $sheet->barrio;
                            $User->username = rand(10000,1000000000);
                            $User->password = bcrypt(rand(10,1000000));
                            $User->save();
                            $this->count++;
                          }else{
                            $this->count_exist++;
                          }
                        }

                      }else{
                        array_push($this->data,$sheet->valiente);
                      }
                    }


                });
            });
          }else{
            return "Archivo Invalido";
          }

          array_push($this->data,"Cantidad Agregados:".$this->count);
          array_push($this->data,"Cantidad Existentes:".$this->count_exist);
          \Session::flash('flash_message','Usuarios Nuevos: '.$this->count.' - Usuarios Existentes: '.$this->count_exist);
          return redirect('/administrator/users/2018-'.$request->leader.'-'.rand(10000,100000));


    }
    public function updateHeadquarter(Request $request){
      $headquarter = User::find($request->headquarterId);
      $headquarter->name = $request->nameHeadquarter;
      $headquarter->username = $request->usernameHeadquarter;
      if($request->passwordHeadquarter!=""){
        $headquarter->password = bcrypt($request->passwordHeadquarter);
      }
      $headquarter->save();
      return redirect('/administrator/users');
    }
    public function candidate(){
      $candidates = User::where('contactType','candidate')->get();
      return view('admin.users.candidateDashboard')->with('candidates',$candidates);
    }
    public function addCandidate(){
      $headquarter = User::where('contactType','sede')->where('userType','admin')->get();
      return view('admin.users.candidate')->with('headquarter',$headquarter);
    }
    public function saveUserCandidate(Request $request){
      $User = new User;
      $User->userType = 'call-center';
      $User->contactType = 'candidate';
      $User->identification = $request->identification;
      $User->name = $request->name;
      $User->lastName = $request->lastname;
      $User->gender = $request->gender;
      $User->phone = $request->phone;
      $User->username = $request->username;
      $User->password = bcrypt($request->password);
      $User->save();

      $headquarter = $request->get('headquarter');

      for ($i = 0; $i < count($headquarter); $i++) {
        $candidateHeadquarter = new candidateHeadquarter;
        $candidateHeadquarter->candidateId = $User->id;
        $candidateHeadquarter->headquarterId = $headquarter[$i];
        $candidateHeadquarter->save();
      }
      return redirect('/administrator');
    }

  }
