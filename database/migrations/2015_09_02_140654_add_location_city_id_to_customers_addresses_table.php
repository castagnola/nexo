<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationCityIdToCustomersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers_addresses', function (Blueprint $table) {
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('locations_cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers_addresses', function (Blueprint $table) {
            $table->dropForeign('customers_addresses_city_id_foreign');
            $table->dropColumn('city_id');
        });
    }
}
