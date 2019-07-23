<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vehicle_list extends Model
{
    protected $table = 'vehicle_lists';
	protected $fillable = [
		'id', 'name', 'description', 'status',
	];
}
