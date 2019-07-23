<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vehicle extends Model
{
	protected $table = 'vehicles';
	protected $fillable = [
		'vendor_id', 'driver_id', 'vehicle_type_id', 'transport', 'unit', 'weight', 'vehicle_num',  'state_id', 'city_id', 'vehicle_status',
	];
  public function driver_info(){
    return $this->belongsTo('App\User', 'driver_id', 'id');
  }
  public function vehicle_docs(){
    return $this->belongsTo('App\Photo', 'id', 'vehicle_id');
  }
  public function state(){
    return $this->belongsTo('App\State', 'state_id', 'id');
  }
  public function city(){
    return $this->belongsTo('App\City', 'city_id', 'id');
  }
  public function vehicle_type(){
    return $this->belongsTo('App\Vehicle_list', 'vehicle_type_id', 'id');
  }
}
