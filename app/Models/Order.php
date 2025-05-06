<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'order_id',
        'discount_id',
        'total_price',
        'subtotal_price',
        'discount_price',
        'tps_tax_price',
        'tvq_tax_price',
        'shipping_price',
        'shipping_method',
        'shipping_tracking_id',
        'shipping_carrier',
        'shipping_service',
        'shipping_estimated_days',
        'shipping_error',
        'shipping_status',
        'status',
        'order_number',
        'total_amount',
        'payment_status',
        'payment_method',
        'transaction_id',
        'shipping_address',
        'billing_address',
        'discount_type',
        'discount_percentage',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discountCoupon()
    {
        return $this->belongsTo(DiscountCoupon::class, 'discount_id');
    }



    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id')
            ->with(['product', 'color', 'userCustomization']);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')
            ->select(['id', 'title','sku', 'description', 'visibility']);
    }

    public function Order_files()
    {
        return $this->hasMany(OrderFiles::class, 'order_id');
    }
    public function ShippingDetails()
    {
        return $this->hasOne(OrderShippingDetail::class, 'order_id');
    }
    public function TaxDetails()
    {
        return $this->hasOne(OrderTaxDetails::class, 'order_id');
    }

    public function shippingRate()
    {
        return $this->hasOne(OrderShippingRate::class);
    }

    /**
     * Get the comments for this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(OrderComment::class, 'order_id');
    }
}
