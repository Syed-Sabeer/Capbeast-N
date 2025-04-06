<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPrintingTable extends Migration
{
    public function up()
    {
        Schema::create('product_printing', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('image')->nullable();
            $table->text('quantity');
            $table->text('price');
            $table->integer('is_leather');
            $table->integer('visibility')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_printing');
    }
}
