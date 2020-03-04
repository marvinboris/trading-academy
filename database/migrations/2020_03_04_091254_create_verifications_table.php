<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('admin_id')->unsigned()->index()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nid');
            $table->date('expiry_date');
            $table->string('doc_1');
            $table->string('doc_2');
            $table->string('doc_3');
            $table->string('gender', 1);
            $table->enum('type', ['nic', 'driving_license', 'passport', 'voter_card']);
            $table->integer('status')->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('verifications');
    }
}
