<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRecurrenceDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_recurrence_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->datetime('start');
            $table->datetime('end');
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
        Schema::drop('services_recurrence_dates');
    }
}
