<?php
 namespace App;
 use Illuminate\Database\Eloquent\Model;
 class Photo extends Model
 {
    protected $table = 'photos';
 	protected $fillable = [
 		'vendor_id', 'driver_id', 'vehicle_id','address_prof_front', 'address_prof_back', 'pancard_front', 'commercial_dl_exp_date', 'commercial_dl_front', 'commercial_dl_back', 'insurance', 'permit', 'fitness_certificate_exp_date', 'fitness_certificate', 'noc', 'loan_emi_detail', 'road_tax_reciept', 'rc_detail', 'bank_passbook', 'police_verification',
 	];

 public function driverInfo(){
  return $this->hasOne('App\User', 'id', 'driver_id');
 }
}
 