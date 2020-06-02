<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcceptedToServiceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_user', function (Blueprint $table) {
            $table->boolean('accepted')->default(false);
            $table->dropColumn('updated_at');
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
            $table->dropColumn('accepted');
            $table->string('updated_at');
        });
    }
}
