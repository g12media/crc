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
use App\Payments;
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

    public function deleteUser(Request $request){
      $identification = $request->identification;
      $userId = $request->userId;
      $leader = $request->leader;

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
        $usersMen = User::where('userId',$user->id)->where('gender','masculino')->get();
        $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->get();
        $usersGeneral = User::where('leaderPrincipal',$user->id)->get();


        $usersGeneralCount = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();
        $usersContactsCount = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();

        $l1 = User::where('location','Antonio Nariño')->count();
        $l2 = User::where('location','Barrios Unidos')->count();
        $l3 = User::where('location','Bosa')->count();
        $l4 = User::where('location','Chapinero')->count();
        $l5 = User::where('location','Ciudad Bolivar')->count();
        $l6 = User::where('location','Fontibon')->count();
        $l7 = User::where('location','Kennedy')->count();
        $l8 = User::where('location','La Candelaria')->count();
        $l9 = User::where('location','Los Martires')->count();
        $l10 = User::where('location','Puente Aranda')->count();
        $l11 = User::where('location','Rafael Uribe Uribe')->count();
        $l12 = User::where('location','San Cristobal')->count();
        $l13 = User::where('location','Santa Fe')->count();
        $l14 = User::where('location','Sumapaz')->count();
        $l15 = User::where('location','Teusaquillo')->count();
        $l16 = User::where('location','Tunjuelito')->count();
        $l17 = User::where('location','Usaquen')->count();
        $l18 = User::where('location','Usme')->count();

         $chartjs =
          app()->chartjs
          ->name('pieChartTest')
          ->type('pie')
          ->size(['width' => 270, 'height' => 200])
          ->labels(['Antonio Nariño', 'Barrios Unidos', 'Bosa', 'Chapinero', 'Ciudad Bolivar', 'Fontibon', 'Kennedy', 'La Candelaria', 'Los Martires', 'Puente Aranda', 'Rafael Uribe', 'San Cristobal', 'Santa Fe', 'Suba', 'Sumapaz', 'Teusaquillo', 'Tunjuelito', 'Usaquen', 'Usme'])
          ->datasets([
              [
                  "label" => "Contactos",
                  'backgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                  'hoverBackgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                  'data' => [$l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18]
              ],
          ])
          ->optionsRaw([
              'legend' => [
                  'display' => false,
              ],
          ]);

          $usersPrincipal = User::where('leaderPrincipal',$user->id)->where('id','!=',$user->id)->select('id','name')->get();

          $contactosArray = array();
          $grupoArray = array();
          
          foreach($usersPrincipal as $ups){
            $g = User::where('leaderPrincipal',$ups->id)->where('id','!=',$ups->id)->where('contactType','ministerio')->select('id','name')->count();
            $c = User::where('leaderPrincipal',$ups->id)->where('id','!=',$ups->id)->where('contactType','contacto')->select('id','name')->count();
            array_push($grupoArray,$g);
            array_push($contactosArray,$c);
          }


          $arrayUsersPrincipal = array();
          foreach($usersPrincipal as $up){
            array_push($arrayUsersPrincipal,$up->name);
          }

          $hBar =
           app()->chartjs
           ->name('barChartTest')
           ->type('horizontalBar')
           ->size(['width' => 270, 'height' => 200])
           ->labels($arrayUsersPrincipal)
           ->datasets([
               [
                   "label" => "Equipo",
                   'backgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                   'hoverBackgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                   'data' => $grupoArray
               ],
               [
                   "label" => "Contactos",
                   'backgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                   'hoverBackgroundColor' => ['#1A237E', '#303F9F', '#3F51B5', '#0D47A1', '#0288D1', '#00838F', '#4DB6AC', '#F9A825', '#FBC02D', '#F9A825', '#FFEB3B', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#F9A825', '#BBDEFB'],
                   'data' => $contactosArray
               ],
           ])
           ->optionsRaw([
               'legend' => [
                   'display' => false,
               ],
           ]);




        $gender_chart = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                'data' => [69, 59]
            ]
        ])
        ->options([]);

        return view('admin.users.index_new')
        ->with('usersGeneral',$usersGeneral)
        ->with('usersMen',$usersMen)
        ->with('usersWomen',$usersWomen)
        ->with('user',$user)
        ->with('usersGeneralCount',$usersGeneralCount)
        ->with('usersContactsCount',$usersContactsCount)
        ->with('hBar',$hBar)
        ->with('gender_chart',$gender_chart)
        ->with('chartjs',$chartjs);



    }

    public function getUsersByProfile($userId){
      $user = User::find(Crypt::decrypt($userId));
      $users = User::where('userId',$user->id)->where('contactType','ministerio')->get();
      $usersContact = User::where('userId',$user->id)->where('contactType','contacto')->get();
      return view('admin.users.profile')->with('users',$users)->with('usersContact',$usersContact)->with('user',$user);
    }

    public function addUsers(){
      return view('admin.users.add');
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
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
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
        $user_principal = Auth::user();
        $userLeader = $this->getLevelByLeader($request->leader);

        $User = new User;
        $User->userType = 'user';
        $User->contactType = 'ministerio';
        $User->identification = $request->identificacion;
        $User->name = $request->name;
        $User->lastName = $request->lastName;
        $User->gender = $request->gender;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->location = $request->location;
        $User->locationVote = $request->locationVote;
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
        $User->userId = Crypt::decrypt($request->leader);
        $User->username = $request->identificacion;
        $User->password = bcrypt($request->identificacion);
        $User->save();

        return redirect('administrator/users/'.$request->leader);


    }

    public function getLevelByLeader($leaderId){
      $user = User::find(Crypt::decrypt($leaderId));
      return $user;
    }
    public function getFormRegister($userId){
      $user = User::find(Crypt::decrypt($userId));
      $users = User::where('userId',Crypt::decrypt($userId))->get();
      return view('admin.users.register')->with('userId',$userId)->with('user',$user)->with('users',$users);
    }

    public function saveFormRegister(Request $request){

      $userLeader = $this->getLevelByLeader($request->leader);
      $user_principal = User::find($userLeader->leaderPrincipal);
      $User = new User;
      $User->userType = 'user';
      $User->contactType = 'ministerio';
      $User->identification = $request->identification;
      $User->name = $request->name;
      $User->lastName = $request->lastName;
      $User->gender = $request->gender;
      $User->phone = $request->phone;
      $User->email = $request->email;
      $User->location = $request->location;
      $User->locationVote = $request->locationVote;
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
      $User->userId = Crypt::decrypt($request->leader);
      $User->username = $request->identification;
      $User->password = bcrypt($request->identification);
      $User->save();
      return redirect('/formulario/'.$request->leader);
    }


}
