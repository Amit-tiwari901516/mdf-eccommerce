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
        Schema::create('drawer_orders', function (Blueprint $table) {
            $table->id();
            $table->enum('unit', ['mm', 'in'])->default('in');
            $table->string('bottom_thickness_grain_direction');
            $table->string('back_notch_drill_undermount_slide');
            $table->string('front_notch_undermount_slide');
            $table->string('bracket');
            $table->string('brand_logo')->nullable();
            $table->foreignId('drawer_product_id')->constrained('drawer_products');
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('depth')->nullable();
            $table->decimal('price');
            $table->longText('note')->nullable();
            $table->string('design')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('status')->default(0)->comment('0=> pending, 1=processing, 2=completed');
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
        Schema::dropIfExists('drawer_orders');
    }
};
