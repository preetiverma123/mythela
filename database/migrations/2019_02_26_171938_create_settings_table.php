<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('insurance')->nullable();
            $table->double('commission')->nullable();
            $table->double('credit_limit_amount')->nullable();
            $table->double('psgst')->nullable();
            $table->double('pcgst')->nullable();
            $table->double('sgst')->nullable();
            $table->double('cgst')->nullable();
            $table->ineger('referal_trip')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
