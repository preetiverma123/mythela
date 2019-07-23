<?php
 namespace App;
 use Illuminate\Database\Eloquent\Model;
 class Booking extends Model
 {
 	protected $table = 'bookings';
 	protected $fillable = [
 		'user_id', 'type', 'picup_lat', 'picup_long', 'drop_lat', 'drop_long', 'vehicle_type_id', 'material_type', 'weight', 'weight_unit', 'goods_price', 'insurance_price', 'when', 'state_id', 'city_id', 'depart_date', 'depart_time', 'status',
 	];
  public function userInfo(){
   return $this->hasOne('App\User', 'id', 'user_id');
  }
  public function driverInfo(){
   return $this->hasMany('App\Booking_confirm', 'booking_id', 'id');
  }
  public function booking_cnf(){
   return $this->hasOne('App\Booking_confirm', 'booking_id', 'id');
  }
  public function transactons(){
   return $this->hasOne('App\Transaction', 'booking_id', 'id');
  }
  public function bookedInfo(){
   return $this->hasOne('App\Booking_confirm', 'booking_id', 'id')->whereIn('status', ['booked', 'ongoing', 'running']);
  }
  public function vehiclelist(){
   return $this->hasOne('App\Vehicle_list', 'id', 'vehicle_type_id');
  }
 }