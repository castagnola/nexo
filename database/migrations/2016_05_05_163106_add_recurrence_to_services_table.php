<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecurrenceToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('recurrence_frequency')->nullable();
            $table->smallInteger('recurrence_interval', false, true)->default(1);
            $table->datetime('recurrence_start')->nullable();
            $table->datetime('recurrence_end')->nullable();
            $table->string('recurrence_weekdays')->nullable();
            $table->smallInteger('recurrence_monthday', false, true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('recurrence_frequency');
            $table->dropColumn('recurrence_interval');
            $table->dropColumn('recurrence_start');
            $table->dropColumn('recurrence_end');
            $table->dropColumn('recurrence_weekdays');
            $table->dropColumn('recurrence_monthday');
        });
    }
}
