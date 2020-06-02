<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLastDistanceToUsersGeolocalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_geolocalizations', function(Blueprint $table) {
            $table->float('last_distance', 10, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_geolocalizations', function(Blueprint $table) {
            $table->dropColumn('last_distance');
        });
    }
}
