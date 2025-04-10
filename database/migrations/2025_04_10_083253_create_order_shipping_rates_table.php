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
        Schema::create('order_shipping_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('postage_type_id')->nullable();
            $table->string('postage_type')->nullable();
            $table->decimal('shipping_price', 10, 2)->default(0);
            $table->string('carrier')->nullable();
            $table->string('service_name')->nullable();
            $table->string('delivery_days')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('tracking_url')->nullable();
            $table->string('label_url')->nullable();
            $table->json('rate_details')->nullable(); // Store full rate response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_shipping_rates');
    }
};
