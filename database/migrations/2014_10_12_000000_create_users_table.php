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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('title')->default('Usuario Estandar');;
            $table->string('avatar')->default('avatar_default.jpg');
            //$table->enum('status',['active','inactive', 'expired'])->default('active')->nullable();
            $table->integer('status_id')->unsigned();
            $table->datetime('last_login')->nullable();
            $table->datetime('last_logout')->nullable();
            $table->rememberToken();
            $table->timestamps();
        
            $table->foreign('status_id')->references('id')->on('user_statuses');
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
