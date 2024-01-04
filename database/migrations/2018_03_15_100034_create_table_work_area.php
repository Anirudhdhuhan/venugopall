<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkArea extends Migration
{
    public function up()
    {
        Schema::create('work_area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });
    }

    public function down()
    {
        Schema::drop('work_area');
    }
}
