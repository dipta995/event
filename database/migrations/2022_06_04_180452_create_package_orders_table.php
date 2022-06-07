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
        Schema::create('package_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_id');
            $table->string('payment_type');
            $table->string('amount');
            $table->string('account_no');
            $table->string('ref');
            $table->string('from_date');
            $table->string('day');
            $table->string('ratting')->nullable();
            $table->longText('comment')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('package_id')->references('id')->on('packages')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_orders');
    }
};
