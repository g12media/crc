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
        $usersMen = User::where('userId',$user->id)->where('gender','masculino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
        $usersWomen = User::where('userId',$user->id)->where('gender','femenino')->where('id','!=',$user->id)->where('contactType','ministerio')->get();
        $usersGeneral = User::where('leaderPrincipal',$user->id)->where('level',12)->get();

        $usersHeadquarters = User::where('contactType','sede')->get();

        $usersTotal = User::all()->count();
        $usersTotalCount = $usersTotal - 1;

        $users12 = User::where('userId',$user->id)->select('id','name')->get();

        $contactos12Array = array();
        $grupo12Array = array();

        foreach($users12 as $ups12){
          $g12 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->count();

          if($g12 != 0){
             $g12select1 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->get();
             foreach($g12select1 as $gs12){
               $g12level1 = User::where('userId',$gs12->id)->where('id','!=',$gs12->id)->where('contactType','ministerio')->select('id','name')->count();
               $g12 = $g12level1 + $g12;
             }
          }

          $c12 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','contacto')->select('id','name')->count();

          if($c12 != 0){
             $c12select1 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->get();
             foreach($c12select1 as $cs12){
               $c12level1 = User::where('userId',$cs12->id)->where('id','!=',$cs12->id)->where('contactType','ministerio')->select('id','name')->count();
               $c12 = $c12level1 + $c12;
             }
          }

          array_push($grupo12Array,$g12);
          array_push($contactos12Array,$c12);

        }

        $arrayUsersPrincipal = array();
        foreach($users12 as $u12){
          array_push($arrayUsersPrincipal,$u12->name);
        }

        $hBar12 =
         app()->chartjs
         ->name('ChartTest')
         ->type('horizontalBar')
         ->size(['width' => 270, 'height' => 200])
         ->labels($arrayUsersPrincipal)
         ->datasets([
             [
                 "label" => "Equipo",
                 'backgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#61C80D', '#7AD11A', '#93DA27', '#ACE334', '#C5EC41', '#DEF54E', '#F8FF5C'],
                 'hoverBackgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#61C80D', '#7AD11A', '#93DA27', '#ACE334', '#C5EC41', '#DEF54E', '#F8FF5C'],
                 'data' => $grupo12Array
             ],
             [
                 "label" => "Contactos",
                 'backgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#61C80D', '#7AD11A', '#93DA27', '#ACE334', '#C5EC41', '#DEF54E', '#F8FF5C'],
                 'hoverBackgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#61C80D', '#7AD11A', '#93DA27', '#ACE334', '#C5EC41', '#DEF54E', '#F8FF5C'],
                 'data' => $contactos12Array
             ],
         ])
         ->optionsRaw([
             'legend' => [
                 'display' => false,
             ],
         ]);


      /*   $l1 = User::where('location','Antonio Nariño')->count();
        $l2 = User::where('location','Barrios Unidos')->count();
        $l3 = User::where('location','Bosa')->count();
        $l4 = User::where('location','Chapinero')->count();
        $l5 = User::where('location','Ciudad Bolivar')->count();
        $l6 = User::where('location','Engativa')->count();
        $l7 = User::where('location','Fontibon')->count();
        $l8 = User::where('location','Kennedy')->count();
        $l9 = User::where('location','La Candelaria')->count();
        $l10 = User::where('location','Los Martires')->count();
        $l11 = User::where('location','Puente Aranda')->count();
        $l12 = User::where('location','Rafael Uribe Uribe')->count();
        $l13 = User::where('location','San Cristobal')->count();
        $l14 = User::where('location','Santa Fe')->count();
        $l15 = User::where('location','Sumapaz')->count();
        $l16 = User::where('location','Teusaquillo')->count();
        $l17 = User::where('location','Tunjuelito')->count();
        $l18 = User::where('location','Usaquen')->count();
        $l19 = User::where('location','Usme')->count();
        $l20 = User::where('location','Engativa')->count();

        $l21 = User::where('location','Soacha')->count();
        $l22 = User::where('location','Mosquera')->count();
        $l23 = User::where('location','Madrid')->count();
        $l24 = User::where('location','Chia')->count();
        $l25 = User::where('location','Cajica')->count();



         $chartjs =
          app()->chartjs
          ->name('pieChartTest')
          ->type('pie')
          ->size(['width' => 390, 'height' => 230])
          ->labels(['Antonio Nariño', 'Barrios Unidos', 'Bosa', 'Chapinero', 'Ciudad Bolivar', 'Engativa', 'Fontibon', 'Kennedy', 'La Candelaria', 'Los Martires', 'Puente Aranda', 'Rafael Uribe', 'San Cristobal', 'Santa Fe', 'Suba', 'Sumapaz', 'Teusaquillo', 'Tunjuelito', 'Usaquen', 'Usme', 'Municipio - Soacha', 'Municipio - Mosquera', 'Municipio - Madrid', 'Municipio - Chia', 'Municipio - Cajica'])
          ->datasets([
              [
                  "label" => "Contactos",
                  'backgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#62C601', '#7CCE02', '#96D408', '#B0DA0F', '#CAE016', '#E4E61D', '#FFED24'],
                  'hoverBackgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00', '#62C601', '#7CCE02', '#96D408', '#B0DA0F', '#CAE016', '#E4E61D', '#FFED24'],
                  'data' => [$l1,$l2,$l3,$l4,$l5,$l6,$l7,$l8,$l9,$l10,$l11,$l12,$l13,$l14,$l15,$l16,$l17,$l18,$l19,$l20,$l21,$l22,$l23,$l24,$l25]
              ],
          ])
          ->optionsRaw([
              'legend' => [
                  'display' => true,
                  'position' => 'left',

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
                   'backgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00'],
                   'hoverBackgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00'],
                   'data' => $grupoArray
               ],
               [
                   "label" => "Contactos",
                   'backgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00'],
                   'hoverBackgroundColor' => ['#5B2EFF', '#372AFB', '#273AF7', '#2456F3', '#2172EF', '#1E8EEC', '#1BAAE8', '#18C6E4', '#15E0DF', '#12DDBD', '#10D99B', '#0DD579', '#0BD157', '#08CE36', '#06CA16', '#12C604', '#2DC202', '#48BF00'],
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
        ->options([]);*/
        if($user->level == 1){
          //Contactos Generales
          $contacts = User::where('contactType','contacto')->count();
          //Valientes Generales
          $valientes = User::where('contactType','ministerio')->count();
        }else{
          if($user->contactType == 'ministerio'){
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','ministerio')->where('id','!=',$user->id)->count();
          }else{
            //Contactos Generales
            $contacts = User::where('leaderPrincipal',$user->id)->where('contactType','contacto')->count();
            //Valientes Generales
            $valientes = User::where('leaderPrincipal',$user->id)->where('contactType','sede')->where('id','!=',$user->id)->count();
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
      if($level1 != 0){
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
      }else {
        $usuarios_contacto = 0;
      }




      $users12 = User::where('userId',$user->id)->select('id','name')->get();

      $contactos12Array = array();
      $grupo12Array = array();

      foreach($users12 as $ups12){
        $g12 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->count();

        if($g12 != 0){
           $g12select1 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->get();
           foreach($g12select1 as $gs12){
             $g12level1 = User::where('userId',$gs12->id)->where('id','!=',$gs12->id)->where('contactType','ministerio')->select('id','name')->count();
             $g12 = $g12level1 + $g12;
           }
        }

        $c12 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','contacto')->select('id','name')->count();

        if($c12 != 0){
           $c12select1 = User::where('userId',$ups12->id)->where('id','!=',$ups12->id)->where('contactType','ministerio')->select('id','name')->get();
           foreach($c12select1 as $cs12){
             $c12level1 = User::where('userId',$cs12->id)->where('id','!=',$cs12->id)->where('contactType','ministerio')->select('id','name')->count();
             $c12 = $c12level1 + $c12;
           }
        }

        array_push($grupo12Array,$g12);
        array_push($contactos12Array,$c12);

      }

      $arrayUsersPrincipal = array();
      foreach($users12 as $u12){
        array_push($arrayUsersPrincipal,$u12->name);
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

    public function getHeadquarter($id){
      $headquarter = User::find($id);
      return $headquarter;
    }
    public function updateHeadquarter(Request $request){
      $headquarter = User::find($request->headquarterId);
      $headquarter->name = $request->nameHeadquarter;
      $headquarter->username = $request->usernameHeadquarter;
      if($request->passwordHeadquarter!=""){
        $headquarter->password = $request->passwordHeadquarter;
      }
      $headquarter->save();
      return redirect('/administrator/users');
    }

}
