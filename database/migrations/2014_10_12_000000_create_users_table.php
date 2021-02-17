<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal')->nullable();
            $table->string('ssn');
            $table->string('dob');
            $table->string('occupation');
            $table->string('verified_id');
            $table->string('pass');
            $table->string('front_extension')->nullable();
            $table->string('back_extension')->nullable();
            $table->string('open_balance');
            $table->string('current_balance');
            $table->string('current_credit');
            $table->string('open_credit');
            $table->string('closed_balance');
            $table->string('closed_credit');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
