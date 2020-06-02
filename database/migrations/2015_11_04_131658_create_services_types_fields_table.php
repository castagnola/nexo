<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTypesFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_types_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_type_id');
            $table->foreign('service_type_id')->references('id')->on('services_types');
            $table->string('type');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_required')->default(0);
            $table->integer('order')->default(1);
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
        Schema::drop('services_types_fields');
    }
}
