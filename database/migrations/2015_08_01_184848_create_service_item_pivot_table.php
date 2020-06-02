<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceItemPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_item', function(Blueprint $table) {
            $table->integer('service_id')->unsigned()->index();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('service_item_id')->unsigned()->index();
            $table->foreign('service_item_id')->references('id')->on('services_items')->onDelete('cascade');
            $table->integer('quantity');
            $table->longtext('observation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_item');
    }
}
