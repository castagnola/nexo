<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBooleansToServicesStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_statuses', function (Blueprint $table) {
            $table->boolean('completed')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('pending')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_statuses', function (Blueprint $table) {
            $table->dropColumn('completed');
            $table->dropColumn('active');
            $table->dropColumn('pending');
        });
    }
}
