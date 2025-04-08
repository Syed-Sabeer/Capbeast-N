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
        Schema::create('customizer_designs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('design_category_id')->constrained('design_categories')->onDelete('cascade');
            $table->string('image');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customizer_designs');
    }
};
