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
        Schema::create('cart_artwork', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('cart')->onDelete('cascade');
            $table->integer('artwork_type');
            $table->text('artwork_dataText')->nullable();
            $table->text('artwork_dataImage')->nullable();
            $table->decimal('patch_length', 8, 2);
            $table->decimal('patch_height', 8, 2);
            $table->string('font_style');
            $table->integer('num_of_imprint');
            $table->text('imprint_color');
            $table->integer('leathercolor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_artwork');
    }
};
