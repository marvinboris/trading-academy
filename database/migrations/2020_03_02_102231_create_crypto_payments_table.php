<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crypto_payments', function (Blueprint $table) {
            $table->bigIncrements('paymentID');
            $table->integer('boxID')->default(0);
            $table->enum('boxType', ['paymentbox', 'captchabox']);
            $table->string('orderID', 50)->default('');
            $table->string('userID', 50)->default('');
            $table->string('countryID', 3)->default('');
            $table->string('coinLabel', 6)->default('');
            $table->double('amount')->default(0);
            $table->double('amountUSD')->default(0);
            $table->tinyInteger('unrecognised')->default(0);
            $table->string('addr', 34)->default('');
            $table->string('txID', 64)->default('');
            $table->dateTime('txDate')->nullable();
            $table->tinyInteger('txConfirmed')->unsigned()->default(0);
            $table->dateTime('txCheckDate')->nullable();
            $table->tinyInteger('processed')->unsigned()->default(0);
            $table->dateTime('processedDate')->nullable();
            $table->dateTime('recordCreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crypto_payments');
    }
}
