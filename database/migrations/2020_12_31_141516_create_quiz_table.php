<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('content');
            $table->string('status');
            $table->string('title');
            $table->string('submodule');
            $table->string('timer');
            $table->dateTime('deadline');
            $table->string('submission');
            $table->string('cheatingAttempt');
            $table->longText('instructions');
            $table->longText('totalItems');
            $table->longText('maxPoints');
            $table->string('hashedUrl');
            $table->longText('classID');
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
        Schema::dropIfExists('quiz');
    }
}
