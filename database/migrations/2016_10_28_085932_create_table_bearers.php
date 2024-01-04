<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBearers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bearers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('post1');
            $table->string('post1_name');
            $table->integer('post2')->nullable();
            $table->string('post2_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('place')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::drop('bearers');
    }
}
