<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function(Blueprint $table) {
            $table->datetime('start_at');
            $table->datetime('end_at');
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
            $table->dropColumn('start_at');
            $table->dropColumn('end_at');
        });
    }
}
