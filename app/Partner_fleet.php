<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Partner_fleet extends Model
{
    protected $table = 'partner_fleet';
 	protected $fillable = [
 		'id', 'name', 'mobile', 'city',
 	];

 	public static function add($data){
        if(!empty($data)){
            return self::insertGetId($data);
        }else{
            return false;
        }   
    }
}