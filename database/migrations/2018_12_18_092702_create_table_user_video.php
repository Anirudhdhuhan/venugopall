<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('profession');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('email');
            $table->string('mobile');
            $table->string('video');
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
        Schema::drop('user_video');
    }
}
