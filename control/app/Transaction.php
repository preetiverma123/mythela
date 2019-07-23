<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $table = 'transactions';
 	protected $fillable = [
 		'user_id', 'booking_id', 'amount', 'status',
 	];
}
