<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswerToPollsAnswersOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls_answers_options', function(Blueprint $table) {
            $table->text('answer')->nullable();
            $table->dropColumn('anwser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polls_answers_options', function(Blueprint $table) {
            $table->dropColumn('answer');
            $table->text('anwser')->nullable();
        });
    }
}
