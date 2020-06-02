<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceUserPivotTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('service_user')) {
            Schema::create('service_user', function (Blueprint $table) {
                $table->integer('service_id')->unsigned()->index();
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->primary(['service_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('service_user')) {
            Schema::drop('service_user');
        }
    }
}
