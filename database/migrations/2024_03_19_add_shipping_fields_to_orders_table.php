<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('shipping_price', 10, 2)->default(0);
            $table->string('shipping_method')->nullable();
            $table->string('shipping_tracking_id')->nullable();
            $table->string('shipping_carrier')->nullable();
            $table->string('shipping_service')->nullable();
            $table->string('shipping_estimated_days')->nullable();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'shipping_price',
                'shipping_method',
                'shipping_tracking_id',
                'shipping_carrier',
                'shipping_service',
                'shipping_estimated_days'
            ]);
        });
    }
};
