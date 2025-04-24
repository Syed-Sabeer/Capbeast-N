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
        Schema::create('abandon_cart_comments', function (Blueprint $table) {
            $table->id();
            // Using bigInteger that can work with both order_id references and cart_ids
            // Not adding a foreign key constraint to allow flexible usage
            $table->unsignedBigInteger('order_id')->comment('Can be order_id or cart_id depending on context');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abandon_cart_comments');
    }
};
