<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('poll_id');
            $table->foreign('poll_id')->references('id')->on('polls');
            $table->text('question');
            $table->string('type');
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
        Schema::drop('polls_questions');
    }
}
