<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_teacher', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('session_id')->unsigned()->index();
            $table->bigInteger('teacher_id')->unsigned()->index();
            $table->timestamps();
            
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_teacher');
    }
}
