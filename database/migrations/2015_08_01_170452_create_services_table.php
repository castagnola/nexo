<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('services_status_id')->unsigned();
            $table->foreign('services_status_id')->references('id')->on('services_statuses');
            $table->integer('services_types_id')->unsigned();
            $table->foreign('services_types_id')->references('id')->on('services_types');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->longText('observations');
            $table->string('code');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->decimal('latitude', 18, 15);
            $table->decimal('longitude', 18, 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services');
    }
}
