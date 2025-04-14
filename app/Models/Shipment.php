<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tracking_code',
        'label',
        'shipping_method',
        'shipping_price',
        'shipping_service',
        'estimated_delivery_days',
        'status'
    ];

    protected $casts = [
        'shipping_price' => 'float',
        'estimated_delivery_days' => 'integer'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
