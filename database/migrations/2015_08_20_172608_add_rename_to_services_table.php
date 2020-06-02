<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRenameToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function(Blueprint $table) {
            $table->renameColumn('services_status_id', 'service_status_id');
            $table->renameColumn('services_types_id', 'service_type_id');
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
            $table->renameColumn('service_status_id', 'services_status_id');
            $table->renameColumn('service_type_id', 'services_types_id');
        });
    }
}
