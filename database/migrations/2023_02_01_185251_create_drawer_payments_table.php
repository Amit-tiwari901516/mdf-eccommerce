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
        Schema::create('drawer_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('order_id');
            $table->string('amount');
            $table->string('response_code');
            $table->string('transaction_id');
            $table->string('auth_id');
            $table->string('message_code');
            $table->string('message');
            $table->string('payment_status')->nullable();
            $table->string('name_on_card');
            $table->string('quantity');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->string('state');
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
        Schema::dropIfExists('drawer_payments');
    }
};
