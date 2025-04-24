<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Backup existing comments if any
        $comments = [];
        if (Schema::hasTable('abandon_cart_comments')) {
            $comments = DB::table('abandon_cart_comments')->get()->toArray();
        }

        // Drop existing table if it exists
        Schema::dropIfExists('abandon_cart_comments');

        // Recreate the table with proper column types
        Schema::create('abandon_cart_comments', function (Blueprint $table) {
            $table->id();
            // Using unsignedBigInteger for order_id to accommodate both order IDs and cart IDs
            // Not adding foreign key constraint to allow storing cart IDs
            $table->unsignedBigInteger('order_id')->comment('Can reference either order_id or cart_id');
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->text('comment')->nullable();
            $table->timestamps();

            // Add index for faster lookups
            $table->index('order_id');
        });

        // Restore comments if we backed them up
        if (!empty($comments)) {
            foreach ($comments as $comment) {
                DB::table('abandon_cart_comments')->insert([
                    'id' => $comment->id,
                    'order_id' => $comment->order_id,
                    'admin_id' => $comment->admin_id,
                    'comment' => $comment->comment,
                    'created_at' => $comment->created_at,
                    'updated_at' => $comment->updated_at,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't provide a rollback path as this is fixing an issue
        // If needed, the original table structure can be recreated using the other migration
    }
};
