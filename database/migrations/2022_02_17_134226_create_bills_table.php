<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('acc_id')->unsigned()->nullable();
            $table->decimal('billamount');
            $table->integer('b1');
            $table->integer('b2');
            $table->integer('b3');
            $table->bigInteger('period_id')->nullable();
            $table->timestamps();
            $table->foreign('acc_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
