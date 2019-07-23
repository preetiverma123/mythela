<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Setting extends Model
{
    protected $table = 'settings';
 	protected $fillable = [
 		'id', 'insurance', 'commission', 'credit_limit_amount', 'psgst', 'pcgst', 'sgst', 'cgst', 'referal_trip', 'alert_fitness_by', 'alert_licence_by', 'insurance_email',
 	];
}
