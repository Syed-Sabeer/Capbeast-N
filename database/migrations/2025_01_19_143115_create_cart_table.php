<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('color_id')->constrained('product_color')->onDelete('cascade');
            $table->foreignId('printing_id')->constrained('product_printing')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('beanie_type');
            $table->integer('is_pompom')->nullable();
            $table->decimal('printing_price', 8, 2);
            $table->decimal('product_price', 8, 2);
            $table->decimal('delivery_price', 8, 2);
            $table->decimal('pompom_price', 8, 2)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB'; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
