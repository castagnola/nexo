<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsAnswersOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls_answers_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('poll_answer_id');
            $table->foreign('poll_answer_id')->references('id')->on('polls_answers');
            $table->text('anwser')->nullable();
            $table->unsignedInteger('poll_option_id')->nullable();
            $table->foreign('poll_option_id')->references('id')->on('polls_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('polls_answers_options');
    }
}
