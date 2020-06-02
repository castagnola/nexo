<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('products_categories');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('weight');
            $table->string('weight_unit')->nullable();
            $table->float('height');
            $table->string('height_unit')->nullable();
            $table->float('width');
            $table->string('width_unit')->nullable();
            $table->float('depth');
            $table->string('depth_unit')->nullable();
            $table->string('SKU')->nullable();
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
        Schema::drop('products');
    }
}
