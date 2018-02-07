<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class callcenterUsers extends Model
{
    //
    protected $table = 'callcenterUsers';


    public function getCountUsers($id){
        $usersCount = callcenterUsers::where('callCenterId',$id)->count();
        return $usersCount;
    }

    public function getMinistry($id){
      $user = \App\User::find($id);
      $ministryName = \App\User::find($user->userId);

      return $ministryName;
    }
}
