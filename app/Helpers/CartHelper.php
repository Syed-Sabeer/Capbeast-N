<?php

namespace App\Helpers;

use App\Models\AbandonCartError;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartHelper
{
    /**
     * Update cart error status with only error status
     * @deprecated Use updateCartError instead
     */
    public static function updateCartErrorStatus($userId, $status)
    {
        // If userId is null but user is authenticated, use the authenticated user's ID
        if ($userId === null && Auth::check()) {
            $userId = Auth::id();
        }

        if ($userId) {
            AbandonCartError::updateOrCreate(
                ['user_id' => $userId],
                ['error_status' => $status]
            );
        } else {
            Log::warning('Attempted to update cart error for non-authenticated user');
        }
    }

    /**
     * Update cart error with category and detailed message
     * 
     * @param string $errorType Single word error type (payment, checkout, shipping, etc.)
     * @param string $errorDetail Detailed error message
     * @param int|null $userId User ID (will use authenticated user if null)
     * @return void
     */
    public static function updateCartError($errorType, $errorDetail = null, $userId = null)
    {
        try {
            // If userId is null but user is authenticated, use the authenticated user's ID
            if ($userId === null && Auth::check()) {
                $userId = Auth::id();
            }

            if ($userId) {
                AbandonCartError::updateOrCreate(
                    ['user_id' => $userId],
                    [
                        'error_status' => $errorType,
                        'error_status_detail' => $errorDetail
                    ]
                );

                Log::error("Cart Error: {$errorType}", [
                    'user_id' => $userId,
                    'error_type' => $errorType,
                    'error_detail' => $errorDetail
                ]);
            } else {
                // Just log the error for non-authenticated users
                Log::warning("Cart Error for anonymous user: {$errorType}", [
                    'error_type' => $errorType,
                    'error_detail' => $errorDetail
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Failed to record cart error: " . $e->getMessage());
        }
    }

    /**
     * Track an error without requiring authentication check
     * This can be used from services where auth()->check() might not be available
     * 
     * @param string $errorType Single word error type (payment, checkout, shipping, etc.)
     * @param string $errorDetail Detailed error message
     * @return void
     */
    public static function trackError($errorType, $errorDetail = null)
    {
        try {
            if (Auth::check()) {
                self::updateCartError($errorType, $errorDetail, Auth::id());
            } else {
                // Just log the error for non-authenticated users
                Log::warning("Cart Error for anonymous user: {$errorType}", [
                    'error_type' => $errorType,
                    'error_detail' => $errorDetail
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Failed to track cart error: " . $e->getMessage());
        }
    }
}
