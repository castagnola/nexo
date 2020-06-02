<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCityIdServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            \DB::statement('SET foreign_key_checks = 0');
            \DB::statement('ALTER TABLE `services` MODIFY `city_id` INTEGER UNSIGNED NULL;');
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
        //
    }
}
