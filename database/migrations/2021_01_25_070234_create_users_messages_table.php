<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admins_id')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('users_id')->constrained('users')->cascadeOnDelete();
            $table->string('subject');
            $table->string('messages');
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
        Schema::dropIfExists('users_messages');
    }
}
