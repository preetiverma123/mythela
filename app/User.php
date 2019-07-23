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
    'fullname', 'profile_pic', 'role_id', 'driver_role_id', 'vendor_role_id', 'email', 'mobile', 'email_verified_at', 'password', 'state_id','city_id', 'inivite', 'address_prof_type', 'address_prof_num', 'remember_token', 'status', 'driver_status', 'vendor_status', 'partner_status', 'refral_code',
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
public function wallet(){
  return $this->hasOne('App\Wallet', 'user_id', 'id');
 }
 public function photo(){
  return $this->belongsTo('App\Photo');
 }
 public function driver(){
  return $this->belongsTo('App\Driver');
 }
 public function driverInfo(){
  return $this->hasOne('App\Driver', 'driver_id', 'id');
 }
 public function vendor_info(){
  return $this->hasOne('App\Driver', 'vendor_id', 'id');
 }
  public function state(){
  return $this->belongsTo('App\State', 'state_id', 'id');
 }
  public function city(){
  return $this->belongsTo('App\City', 'city_id', 'id');
 }
   public function vehicle_info(){
    return $this->belongsTo('App\Vehicle', 'driver_id', 'id');
  }
}
