<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusIdToServicesRecurrenceDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_recurrence_dates', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('services_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_recurrence_dates', function (Blueprint $table) {
            $table->dropForeign('services_recurrence_dates_status_id_foreign');
            $table->dropColumn('status_id');
        });
    }
}
