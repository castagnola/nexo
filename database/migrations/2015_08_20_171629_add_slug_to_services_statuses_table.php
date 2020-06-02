<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToServicesStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_statuses', function(Blueprint $table) {
            $table->string('slug');
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_statuses', function(Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('color');
        });
    }
}
