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
        Schema::table('abandon_cart_errors', function (Blueprint $table) {
            if (!Schema::hasColumn('abandon_cart_errors', 'error_status_detail')) {
                $table->text('error_status_detail')->nullable()->after('error_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abandon_cart_errors', function (Blueprint $table) {
            if (Schema::hasColumn('abandon_cart_errors', 'error_status_detail')) {
                $table->dropColumn('error_status_detail');
            }
        });
    }
};
