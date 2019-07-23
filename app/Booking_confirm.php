<?php
 namespace App;
 use Illuminate\Database\Eloquent\Model;
 class Booking_confirm extends Model
 {
 protected $table = 'booking_confirms';
     protected $fillable = [
        'driver_id', 'booking_id', 'price', 'current_book_lat', 'current_book_long', 'commission_charge', 'after_commission_price', 'psgst', 'pafter_sgst_price', 'pcgst', 'pafter_cgst_price', 'sgst', 'after_sgst_price', 'cgst', 'after_cgst_price', 'status', 'destination_status',
    ];
  public function userInfo(){
   return $this->hasOne('App\User', 'id', 'driver_id');
  }
  public function bookingInfo(){
   return $this->hasOne('App\Booking', 'id', 'booking_id');
  }
  public function driverInfo(){
    return $this->hasOne('App\User', 'id', 'driver_id');
  }
  public function vehicleInfo(){
    return $this->hasOne('App\Vehicle', 'driver_id', 'driver_id');
  }
  public function vehicledetail(){
    return $this->hasOne('App\Vehicle_list', 'id', 'vehicle_type_id');
  }
  public function driverExtInfo(){
    return $this->hasOne('App\Driver', 'driver_id', 'driver_id');
  }
  public function transaction(){
    return $this->hasOne('App\Transaction', 'booking_id', 'booking_id');
  }
  public function wallet(){
    return $this->hasOne('App\Wallet', 'user_id', 'driver_id');
  }
 }
 