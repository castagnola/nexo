<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls_options', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('poll_question_id');
            $table->foreign('poll_question_id')->references('id')->on('polls_questions');
            $table->text('option');
            $table->tinyInteger('order')->default(0);
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
        Schema::drop('polls_options');
    }
}
