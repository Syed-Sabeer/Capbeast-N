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
        'label_base64',
        'shipment_code',
        'base_rate',
        'rate',
        'tax',
        'total',
        'currency',
        'trackable',
        'package_type',
        'add_ons',
        'rate_details'
    ];

    protected $casts = [
        'rate_details' => 'array',
        'add_ons' => 'array',
        'shipping_price' => 'decimal:2',
        'base_rate' => 'decimal:2',
        'rate' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'trackable' => 'boolean'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
