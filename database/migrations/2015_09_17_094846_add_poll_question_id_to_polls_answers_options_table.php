<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPollQuestionIdToPollsAnswersOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls_answers_options', function (Blueprint $table) {
            $table->unsignedInteger('poll_question_id');
            $table->foreign('poll_question_id')->references('id')->on('polls_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polls_answers_options', function (Blueprint $table) {
            $table->dropForeign('polls_answers_options_poll_question_id_foreign');
            $table->dropColumn('poll_question_id');
        });
    }
}
