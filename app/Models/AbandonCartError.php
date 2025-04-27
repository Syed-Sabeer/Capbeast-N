<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbandonCartError extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'error_status',
        'error_status_detail',
    ];
}
