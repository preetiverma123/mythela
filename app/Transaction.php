<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
  protected $table = 'transactions';
 	protected $fillable = [
 		'user_id', 'wallet_id', 'wallet_id_to', 'order_id', 'booking_id', 'amount', 'payment_method','status',
 	];

  public function wallet(){
    return $this->belongsTo('App\Wallet');
  }
  public function bookingInfo(){
    return $this->belongsTo('App\Booking', 'booking_id', 'id');
  }
  public function relatedtrans(){
    return $this->hasOne('App\Booking_confirm', 'booking_id', 'booking_id');
  }
  public function User() {
    return $this->belongsTo('App\User');
  }
}
