<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualificationsToGraduateVoterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('graduate_voter', function (Blueprint $table) {
            $table->string('qualifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('graduate_voter', function (Blueprint $table) {
            $table->dropColumn('qualifications');
        });
    }
}
