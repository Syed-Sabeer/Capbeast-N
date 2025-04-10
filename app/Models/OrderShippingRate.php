<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'postage_type_id',
        'postage_type',
        'shipping_price',
        'carrier',
        'service_name',
        'delivery_days',
        'tracking_number',
        'tracking_url',
        'label_url',
        'rate_details'
    ];

    protected $casts = [
        'rate_details' => 'array',
        'shipping_price' => 'decimal:2'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
