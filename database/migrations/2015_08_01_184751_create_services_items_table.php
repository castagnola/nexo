<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('service_type_id')->unsigned();
            $table->foreign('service_type_id')->references('id')->on('services_types');
            $table->string('name');
            $table->longtext('description');
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
        Schema::drop('services_items');
    }
}
