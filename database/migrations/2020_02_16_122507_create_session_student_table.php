<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id')->unsigned()->index();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->timestamps();
            
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_student');
    }
}
