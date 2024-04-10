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
        Schema::create('drawer_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->float('price')->default(0);
            $table->text('description')->nullable();
            $table->boolean('type')->default(0)->comment('0=normal, 1=special');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('drawer_products');
    }
};
