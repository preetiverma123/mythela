<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Vehicle_surround_area extends Model
{
	protected $table = 'vehicle_surround_areas';
	protected $fillable = [
		'city_id', 'range_area',
	];
}
