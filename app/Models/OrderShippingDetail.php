<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderShippingDetail extends Model
{
    use HasFactory;

 
    protected $table = 'order_shipping_detail';

 
    protected $fillable = [
        'order_id',
        'firstname',
        'lastname',
        'companyname',
        'country',
        'state',
        'address',
        'email',
        'phone',
        'additional_info',
    ];

    /**
     * Get the order that owns the shipping detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
