<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateToServiceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_user', function (Blueprint $table) {
            $table->datetime('start_at')->nullable();
            $table->datetime('end_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->boolean('accepted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_user', function (Blueprint $table) {
            $table->dropColumn('start_at');
            $table->dropColumn('end_at');
            $table->dropColumn('accepted');
            $table->dropColumn('accepted_at');
        });
    }
}
