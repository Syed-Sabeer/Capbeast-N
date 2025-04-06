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
        Schema::create('discount_coupon', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->integer('discount_type');
            $table->morphs('discountable');
            $table->float('percentage',8,2);
            $table->integer('is_all')->nullable();
            $table->integer('is_expiry');
            $table->integer('count')->nullable();
            $table->timestamp('duration_from')->nullable();
            $table->timestamp('duration_to')->nullable();
            $table->integer('visibility');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_coupon');
    }
};
