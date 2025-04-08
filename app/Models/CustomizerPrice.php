<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizerPrice extends Model
{
    use HasFactory;
    protected $table = 'customizer_prices';

    // Fields that can be mass-assigned
    protected $fillable = ['front_price', 'back_price', 'left_price', 'right_price'];
}
