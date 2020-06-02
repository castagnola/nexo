<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfigurationToTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function(Blueprint $table) {
            $table->time('work_time_start')->default('7:00');
            $table->time('work_time_end')->default('22:00');
            $table->integer('work_time_minutes')->default(30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function(Blueprint $table) {
            $table->dropColumn('work_time_start');
            $table->dropColumn('work_time_end');
            $table->dropColumn('work_time_minutes');
        });
    }
}
