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
            $table->string('fullname')->nullable();
            $table->string('profile_pic')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('driver_role_id')->nullable();
            $table->integer('vendor_role_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('inivite')->nullable();
            $table->string('address_prof_type')->nullable();
            $table->string('address_prof_num')->nullable();
            $table->rememberToken();
            $table->enum('status', ['pending', 'block', 'approved'])->default('approved');
            $table->enum('driver_status', ['pending', 'block', 'approved'])->default('approved');
            $table->enum('vendor_status', ['pending', 'block', 'approved'])->default('approved');
            $table->enum('partner_status', ['pending', 'block', 'approved'])->default('approved');
            $table->string('refral_code')->nullable();
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
