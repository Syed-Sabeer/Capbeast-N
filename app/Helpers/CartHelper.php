<?php

namespace App\Helpers;

use App\Models\AbandonCartError;

class CartHelper
{
    public static function updateCartErrorStatus($userId, $status)
    {
        AbandonCartError::updateOrCreate(
            ['user_id' => $userId], 
            ['error_status' => $status]
        );
    }
}
