<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    use HasFactory;
    protected $table = 'discount_coupon';

    protected $fillable = [
        'title',
        'code',
        'coupon_country',
        
        'discount_type',
        'item_id',
        'percentage',
        'is_all',
        'is_expiry',
        'count',
        'duration_from',
        'duration_to',
        'visibility',
    ];

    protected $guarded = [];
    public function discountable()
    {
        return $this->morphTo();
    }
}
