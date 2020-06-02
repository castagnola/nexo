<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('observations')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('transport_id');
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->string('max_capacity')->nullable();
            $table->integer('max_passengers')->default(1);
            $table->integer('max_speed')->nullable();
            $table->string('license_plate')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_own')->default(0);
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
        Schema::drop('users_transports');
    }
}
