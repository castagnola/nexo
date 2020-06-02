<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersPhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_phones', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('type');
            $table->string('phone');
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
        Schema::drop('customers_phones');
    }
}
