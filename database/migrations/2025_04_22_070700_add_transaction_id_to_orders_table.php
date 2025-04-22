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
        Schema::table('orders', function (Blueprint $table) {
            // Add payment_method column if it doesn't exist
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->nullable();
            }

            // Add transaction_id column 
            if (!Schema::hasColumn('orders', 'transaction_id')) {
                $table->string('transaction_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop transaction_id column if it exists
            if (Schema::hasColumn('orders', 'transaction_id')) {
                $table->dropColumn('transaction_id');
            }

            // Drop payment_method column if it exists
            if (Schema::hasColumn('orders', 'payment_method')) {
                $table->dropColumn('payment_method');
            }
        });
    }
};
