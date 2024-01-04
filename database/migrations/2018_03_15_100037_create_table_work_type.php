<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkType extends Migration
{
    public function up()
    {
        Schema::create('work_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
        });
    }

    public function down()
    {
        Schema::drop('work_type');
    }
}
