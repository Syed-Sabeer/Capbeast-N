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
        Schema::create('order_tax_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Link to the order
            $table->string('tps_tax_no');
            // $table->integer('tps_tax_amount');
            $table->integer('tps_tax_percentage');
            $table->string('tvq_tax_no');
            // $table->integer('tvq_tax_amount');
            $table->integer('tvq_tax_percentage');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tax_details');
    }
};
