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
        Schema::create('channel_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_id');
            $table->string('payment_type');
            $table->string('account_no');
            $table->string('ref');
            $table->string('amount');
            $table->string('from_date');
            $table->string('to_date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('channel_id')->references('id')->on('channels')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channel_payments');
    }
};
