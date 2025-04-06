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
        'status',
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
            ->with(['product', 'color']);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')
            ->select(['id', 'title', 'description', 'visibility']);
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
  
}
