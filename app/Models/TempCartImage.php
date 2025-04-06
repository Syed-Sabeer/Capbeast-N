<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCartImage extends Model
{
    use HasFactory;

    protected $table = 'temp_cart_images';

    protected $fillable = [
        'session_id',
        'artwork_dataImage',
    ];

    public $timestamps = false;
}
