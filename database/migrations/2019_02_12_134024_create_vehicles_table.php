<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVehiclesTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('vehicles', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('vendor_id');
        $table->integer('driver_id')->nullable();
        $table->string('vehicle_type_id');
        $table->enum('transport', ['yes', 'no']);
        $table->enum('unit', ['kg', 'ton'])->nullable();
        $table->decimal('weight', 8, 2)->nullable();
        $table->string('vehicle_num')->nullable();
        $table->integer('state_id')->nullable();
        $table->integer('city_id')->nullable();
        $table->enum('vehicle_status', ['pending', 'block', 'approved']);
        $table->timestamps();
    });
}
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::dropIfExists('vehicles');
}
}
