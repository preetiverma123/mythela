<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('type');
            $table->double('picup_lat');
            $table->double('picup_long');
            $table->double('drop_lat');
            $table->double('drop_long');
            $table->integer('vehicle_type_id');
            $table->string('material_type');
            $table->decimal('weight');
            $table->string('weight_unit');
            $table->decimal('goods_price', 8, 2)->nullable();
            $table->double('insurance_price')->nullable();
            $table->enum('when', ['now', 'Schedule_for_later']);
            $table->timestamp('depart_date');
            $table->time('depart_time');
            $table->enum('status', ['expired', 'notexpired'])->default('notexpired');
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
        Schema::dropIfExists('bookings');
    }
}
