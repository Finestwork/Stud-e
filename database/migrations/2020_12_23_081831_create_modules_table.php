<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('secondary_title');
            $table->longText('description');
            $table->string('document_id');
            $table->string('video_id');
            $table->string('audio_id');
            $table->string('image_id');
            $table->string('pdf_id');
            $table->string('txt_id');
            $table->unsignedBigInteger('primary_title_id');
            $table->timestamps();
            $table->foreign('primary_title_id')->references('id')->on('module_primary_titles')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
