<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_type', function (Blueprint $table) {
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('services_types')->onDelete('cascade');
            $table->primary(['service_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_type');
    }
}
