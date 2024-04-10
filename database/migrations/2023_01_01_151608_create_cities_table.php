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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('courier')->nullable();
            $table->string('min')->nullable();
            $table->decimal('zero')->nullable();
            $table->decimal('500')->nullable();
            $table->decimal('1000')->nullable();
            $table->decimal('2000')->nullable();
            $table->decimal('5000')->nullable();
            $table->decimal('10000')->nullable();
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
        Schema::dropIfExists('cities');
    }
};
