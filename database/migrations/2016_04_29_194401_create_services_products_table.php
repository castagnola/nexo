<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            \DB::statement('ALTER TABLE `services` MODIFY `service_type_id` INTEGER UNSIGNED NULL;');
        });

        Schema::create('services_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('services_products');

        Schema::table('services', function (Blueprint $table) {
            \DB::statement('ALTER TABLE `services` MODIFY `service_type_id` INTEGER UNSIGNED NOT NULL;');
        });
    }
}
