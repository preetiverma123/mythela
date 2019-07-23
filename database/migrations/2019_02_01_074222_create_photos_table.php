<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->string('address_prof_front')->nullable();
            $table->string('address_prof_back')->nullable();
            $table->string('pancard_front')->nullable();
            $table->string('commercial_dl_exp_date')->nullable();
            $table->string('commercial_dl_front')->nullable();
            $table->string('commercial_dl_back')->nullable();
            $table->string('insurance')->nullable();
            $table->string('permit')->nullable();
            $table->string('fitness_certificate_exp_date')->nullable();
            $table->string('fitness_certificate')->nullable();
            $table->string('noc')->nullable();
            $table->string('loan_emi_detail')->nullable();
            $table->string('road_tax_reciept')->nullable();
            $table->string('rc_detail')->nullable();
            $table->string('bank_passbook')->nullable();
            $table->string('police_verification')->nullable();
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
        Schema::dropIfExists('photos');
    }
}
