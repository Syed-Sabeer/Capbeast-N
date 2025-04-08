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
        Schema::create('customizer_prices', function (Blueprint $table) {
            $table->id();
            $table->string('front_price');
            $table->string('back_price');
            $table->string('left_price');
            $table->string('right_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customizer_prices');
    }
};
