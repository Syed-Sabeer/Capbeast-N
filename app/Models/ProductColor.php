<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_color';
    protected $fillable = ['product_id', 'color_name_1','color_code_1','color_name_2','color_code_2', 'front_image', 'back_image', 'right_image', 'left_image','is_front','is_back','is_left','is_right'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
