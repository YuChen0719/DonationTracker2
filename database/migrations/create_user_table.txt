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
        Schema::create('Users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('UserName')->unique();
            $table->string('password');
            $table->timestamps('LastLoggedIn');
            $table->string('email')->unique();
            $table->string('UserType');
            $table->boolean('Active');
            $table->rememberToken();
            $table->unsignedBigInteger('Church');

            $table->foreign('Church')->references('ChurchID')->on('Church');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
}
