<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Church', function (Blueprint $table) {
            $table->id('ChurchID');
            $table->string('Name')->unique();
            $table->string('Address');
            $table->string('Creator')->unique();
            $table->boolean('Active');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Church');
    }
}
