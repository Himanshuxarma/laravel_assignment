<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuizDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_quiz_details', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('quiz_attempt_id')->unsigned();
            $table->foreign('quiz_attempt_id')->references('id')->on('quiz_attempts');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->boolean('is_reviewed')->default(0);
            $table->boolean('is_attempted')->default(0);
            $table->boolean('is_correct')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('user_quiz_details');
    }
}
