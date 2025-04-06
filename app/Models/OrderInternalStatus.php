<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInternalStatus extends Model
{
    use HasFactory;

    protected $table = 'order_internal_status'; // Define the table name if different

    protected $fillable = [
        'order_id',
        'internal_status_id',
    ];

    /**
     * Define the relationship with the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class); // Assuming you have an Order model
    }

    /**
     * Define the relationship with the InternalStatus model, including soft-deleted records.
     */
    public function internalStatus()
    {
        return $this->belongsTo(InternalStatus::class, 'internal_status_id')->withTrashed(); // Include soft-deleted statuses
    }
}
