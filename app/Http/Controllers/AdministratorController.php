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



    public function getUsers(){
        $user = Auth::user();
        $usersMen = User::where('userId',$user->id)->where('gender','masculino')->get();
        $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->get();
        $usersGeneral = User::where('leaderPrincipal',$user->id)->get();
        $usersGeneralCount = User::where('leaderPrincipal',$user->id)->count();



        $l1 = User::where('leaderPrincipal',$user->id)->where('location','Antonio Nariño')->count();
        $l2 = User::where('leaderPrincipal',$user->id)->where('location','Barrios Unidos')->count();
        $l3 = User::where('leaderPrincipal',$user->id)->where('location','Bosa')->count();
        $l4 = User::where('leaderPrincipal',$user->id)->where('location','Chapinero')->count();
        $l5 = User::where('leaderPrincipal',$user->id)->where('location','Ciudad Bolivar')->count();
        $l6 = User::where('leaderPrincipal',$user->id)->where('location','Fontibon')->count();
        $l7 = User::where('leaderPrincipal',$user->id)->where('location','Kennedy')->count();
        $l8 = User::where('leaderPrincipal',$user->id)->where('location','La Candelaria')->count();
        $l9 = User::where('leaderPrincipal',$user->id)->where('location','Los Martires')->count();
        $l10 = User::where('leaderPrincipal',$user->id)->where('location','Puente Aranda')->count();
        $l11 = User::where('leaderPrincipal',$user->id)->where('location','Rafael Uribe Uribe')->count();
        $l12 = User::where('leaderPrincipal',$user->id)->where('location','San Cristobal')->count();
        $l13 = User::where('leaderPrincipal',$user->id)->where('location','Santa Fe')->count();
        $l14 = User::where('leaderPrincipal',$user->id)->where('location','Sumapaz')->count();
        $l15 = User::where('leaderPrincipal',$user->id)->where('location','Teusaquillo')->count();
        $l16 = User::where('leaderPrincipal',$user->id)->where('location','Tunjuelito')->count();
        $l17 = User::where('leaderPrincipal',$user->id)->where('location','Usaquen')->count();
        $l18 = User::where('leaderPrincipal',$user->id)->where('location','Usme')->count();


        $chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 100])
         ->labels(['Antonio Nariño', 'Barrios Unidos', 'Bosa', 'Chapinero', 'Ciudad Bolivar', 'Fontibon', 'Kennedy', 'La Candelaria', 'Los Martires', 'Puente Aranda', 'Rafael Uribe', 'San Cristobal', 'Santa Fe', 'Suba', 'Sumapaz', 'Teusaquillo', 'Tunjuelito', 'Usaquen', 'Usme'])
         ->datasets([
             [
                 "label" => "Contactos",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
                 'data' => [$l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18]
             ],

         ])
         ->options([]);

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
      return view('admin.users.register')->with('userId',$userId);
    }

    public function saveFormRegister(Request $request){

      $userLeader = $this->getLevelByLeader($request->leader);
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
      $User->location = $request->location;
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
