<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->integer('role_id');
        $table->string('mobile')->unique();
        $table->string('email')->unique();
        $table->enum('status', ['pending', 'block', 'approved'])->default('pending');
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->integer('state_id')->nullable();
        $table->integer('city_id')->nullable();
        $table->rememberToken();
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
    Schema::dropIfExists('users');
}
}
