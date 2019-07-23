<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Driver extends Model
{
   protected $table = 'drivers';
     protected $fillable = [
        'vendor_id', 'driver_id', 'current_lat', 'current_long', 'status',
    ];

public function driverInfo(){
  return $this->hasMany('App\User');
 }
 public function state(){
    return $this->belongsTo('App\State', 'state_id', 'id');
  }
  public function city(){
    return $this->belongsTo('App\City', 'city_id', 'id');
  }
  public function uInfo(){
    return $this->belongsTo('App\User', 'driver_id', 'driver_id');
  }
}
