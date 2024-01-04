<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkDivision extends Migration
{
    public function up()
    {
        Schema::create('work_division', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });
    }

    public function down()
    {
        Schema::drop('work_division');
    }
}
