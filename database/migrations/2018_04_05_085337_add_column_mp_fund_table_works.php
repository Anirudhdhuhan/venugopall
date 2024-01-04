<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMpFundTableWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->boolean('mp_fund')->default(0);
            $table->integer('position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('mp_fund');
            $table->dropColumn('position');
        });
    }
}
