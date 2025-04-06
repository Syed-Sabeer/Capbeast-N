<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrinting extends Model
{
    use HasFactory;

    
    protected $table = 'product_printing';

   
    protected $primaryKey = 'id';

   
    protected $fillable = [
        'title',
        'image',
        'quantity',
        'price',
        'is_leather',
    ];

    public $timestamps = true;

 
    protected $casts = [
        'quantity' => 'array', 
        'price' => 'array',    
    ];

    public function discountCoupons()
    {
        return $this->morphMany(DiscountCoupon::class, 'discountable');
    }
}
