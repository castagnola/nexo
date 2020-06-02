<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerAddressIdToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function(Blueprint $table) {
            $table->unsignedInteger('customer_address_id');
            $table->foreign('customer_address_id')->references('id')->on('customers_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function(Blueprint $table) {
            $table->dropColumn('customer_address_id');
            $table->dropColumn('customer_address_id');
        });
    }
}
