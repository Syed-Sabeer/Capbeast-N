<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    use HasFactory;

    protected $table = 'user_wishlists'; // Define table name

    protected $fillable = ['user_id', 'product_id']; // Allow mass assignment

    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}
