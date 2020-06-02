<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeclinedToServicesAssingments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services_assignments', function(Blueprint $table) {
            $table->boolean('declined')->default(0);
            $table->timestamp('declined_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services_assignments', function(Blueprint $table) {
            $table->dropColumn('declined');
            $table->dropColumn('declined_at');
        });
    }
}
