<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('component_product_color', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id(); // unsignedBigInteger
            $table->string('color_name');
            $table->string('color_code');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('component_product_color');
    }
};

