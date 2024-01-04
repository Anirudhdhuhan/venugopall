<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTableWorks extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('description');
            $table->integer('work_area');
            $table->integer('work_type');
            $table->integer('work_devision');
            $table->string('images')->nullable();
            $table->string('posted_by')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('works');
    }
}
