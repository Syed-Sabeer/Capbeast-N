<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable()->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Link to the user
            $table->foreignId('discount_id')->constrained('discount_coupon')->onDelete('cascade'); // Link to the user
            $table->decimal('total_price', 10, 2); 
            $table->decimal('subtotal_price', 10, 2); 
            $table->decimal('discount_price', 10, 2); 
            $table->decimal('tps_tax_price', 10, 2); 
            $table->decimal('tvq_tax_price', 10, 2); 
            $table->integer('status')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
