<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVolumeDiscount extends Model
{
    use HasFactory;

    protected $table = 'product_volume_discount';
    protected $fillable = ['product_id', 'discount', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
