<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricingTable extends Migration
{
    public function up()
    {
        Schema::create('product_pricing', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->decimal('pricing', 8, 2); 
            $table->decimal('reseller_pricing', 8, 2); 
            $table->integer('quantity'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_pricing');
    }
}
