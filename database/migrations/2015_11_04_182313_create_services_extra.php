<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesExtra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_extra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedInteger('service_type_field_id');
            $table->foreign('service_type_field_id')->references('id')->on('services_types_fields');
            $table->text('value');
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
        Schema::drop('services_extra');
    }
}
