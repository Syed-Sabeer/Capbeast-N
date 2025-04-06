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
        Schema::create('order_internal_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); 
            /* 
            I added this line for soft delete cuz
                If i delete the status then it will show my status still to my old records where it was inserted before deleting
            */
            // Use onDelete('set null') for soft deletes on internal_status table
            $table->foreignId('internal_status_id')->nullable()->constrained('internal_status')->onDelete('set null'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_internal_status');
    }
};
