<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudioStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio_storage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('storage_path');
            $table->longText('original_name');
            $table->longText('hashed_name');
            $table->longText('original_path');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();
            $table->foreign('teacher_id')->references('id')->on('teacher')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audio_storage');
    }
}
