<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBookingConfirmsTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('booking_confirms', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('driver_id');
        $table->integer('booking_id');
        $table->float('price');
        $table->double('current_book_lat')->nullable();
        $table->double('current_book_long')->nullable();
        $table->enum('status', ['pending', 'cancelled', 'expired', 'ongoing', 'completed', 'booked']);
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
    Schema::dropIfExists('booking_confirms');
}
}
