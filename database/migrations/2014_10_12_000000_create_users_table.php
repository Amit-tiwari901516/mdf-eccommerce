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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_email')->unique();
            $table->string('user_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_pass');
            $table->string('user_billing_fname')->nullable();
            $table->string('user_billing_lname')->nullable();
            $table->string('user_billing_company')->nullable();
            $table->string('user_billing_po')->nullable();
            $table->string('user_billing_tax')->nullable();
            $table->string('user_billing_address')->nullable();
            $table->string('user_billing_city')->nullable();
            $table->string('user_billing_postal')->nullable();
            $table->string('user_billing_phone')->nullable();
            $table->string('user_billing_email')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
