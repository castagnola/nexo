<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressInfoToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('address_city')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address_place_id')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_vicinity')->nullable();
            $table->text('address_observations')->nullable();

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
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('address_city');
            $table->dropColumn('address_country');
            $table->dropColumn('address_place_id');
            $table->dropColumn('address_state');
            $table->dropColumn('address_district');
            $table->dropColumn('address_vicinity');
            $table->dropColumn('address_observations');
        });
    }
}
