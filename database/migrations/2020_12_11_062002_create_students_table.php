<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('f_name', 45);
            $table->string('m_name', 45);
            $table->string('l_name', 45);
            $table->string('email', 320)->unique();
            $table->string('password', 128);
            $table->unsignedBigInteger('role_id');
            $table->boolean('is_verified');
            $table->longText('verification_url');
            $table->string('verified_at');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('students');
        Schema::enableForeignKeyConstraints();
    }
}
