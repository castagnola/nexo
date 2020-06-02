<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityCountryToCustomersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers_addresses', function (Blueprint $table) {
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('street_number')->nullable();
            $table->string('place_id')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('vicinity')->nullable();
            $table->text('observations')->nullable();
            $table->boolean('is_autocompleted')->default(false);

            \DB::statement('SET foreign_key_checks = 0');
            \DB::statement('ALTER TABLE `customers_addresses` MODIFY `city_id` INTEGER UNSIGNED NULL;');
            \DB::statement('SET foreign_key_checks = 1');
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
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('country_code');
            $table->dropColumn('street_number');
            $table->dropColumn('place_id');
            $table->dropColumn('state');
            $table->dropColumn('district');
            $table->dropColumn('vicinity');
            $table->dropColumn('is_autocompleted');
            $table->dropColumn('observations');
        });
    }
}
