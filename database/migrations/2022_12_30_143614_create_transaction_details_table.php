<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactionID')->unsigned();
            $table->foreign('transactionID')->references('id')->on('transactions')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('itemID')->unsigned();
            $table->foreign('itemID')->references('id')->on('items')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('userID');
            $table->integer('quantity');
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
        Schema::dropIfExists('transaction_details');
    }
}
