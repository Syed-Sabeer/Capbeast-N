<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AbandonCartComment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'abandon_cart_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', // Can be order_id or cart_id (user_id) for abandoned carts
        'admin_id',
        'comment',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer', // Ensure order_id is treated as integer
        'admin_id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the order that the comment belongs to.
     * Note: This relationship may be null for abandoned carts without orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|null
     */
    public function order()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }

    /**
     * Get the cart that the comment belongs to (for abandoned carts without orders).
     * This is a dynamic relationship based on user_id.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|null
     */
    public function cartItems()
    {
        // In this context, order_id could actually be a user_id for abandoned carts
        return Cart::where('user_id', $this->order_id)->get();
    }

    /**
     * Get the admin that created the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get the formatted creation date.
     *
     * @return string
     */
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Check if the comment is associated with an order or a cart.
     *
     * @return bool
     */
    public function isOrderComment()
    {
        return $this->order()->exists();
    }
}
