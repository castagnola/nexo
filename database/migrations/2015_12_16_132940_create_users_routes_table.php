<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
            $table->longText('route')->nullable();
            $table->integer('eta')->nullable();
            $table->integer('distance')->nullable();
            $table->decimal('from_latitude', 18, 15)->nullable();
            $table->decimal('from_longitude', 18, 15)->nullable();
            $table->dateTime('next_query')->nullable();
            $table->dateTime('arrival_date')->nullable();
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
        Schema::drop('routes');
    }
}
