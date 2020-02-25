<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('teacher_id')->unsigned()->index();
            $table->string('title', 50)->unique();
            $table->string('subtitle');
            $table->text('description');
            $table->text('course_content');
            $table->text('requirements');
            $table->text('what_you_will_learn');
            $table->text('includes');
            $table->float('price');
            $table->integer('duration');
            $table->string('lang')->default('French');
            $table->integer('level_rank');
            $table->string('level_name');
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
        Schema::dropIfExists('courses');
    }
}
