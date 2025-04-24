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
        Schema::create('order_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('Reference to order ID');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->timestamps();

            // Add indexes for better performance
            $table->index('order_id');

            // Add foreign key constraint - this is safe for order_id since it's always an order
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_comments');
    }
};
