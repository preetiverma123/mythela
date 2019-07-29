<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
    'first_name', 'last_name', 'role_id', 'mobile', 'email', 'status', 'password', 'state_id', 'city_id',
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
    'password', 'remember_token',
];
public function role(){
  return $this->belongsTo('App\Role');
 }

 public static function change($userID,$data){
    $isUpdated = false;
    $table_users_realestate = \DB::table('ogonn_ogonn');
    if(!empty($data)){
        $table_users_realestate->where('id','=',$userID);
        $isUpdated = $table_users_realestate->update($data); 
    }
    return (bool)$isUpdated;
}
}

