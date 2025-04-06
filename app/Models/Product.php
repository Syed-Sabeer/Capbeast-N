<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSEO;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products'; // Define the table name
    protected $fillable = ['brand_id', 'mlb_id', 'title', 'slug', 'description', 'cost_price', 'selling_price', 'visibility'];

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function productSEO()
    {
        return $this->hasOne(ProductSEO::class, 'product_id');
    }

    public function productBrand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productVolumeDiscount()
    {
        return $this->hasMany(ProductVolumeDiscount::class, 'product_id'); // Updated to hasMany for multiple pricing options
    }

    public function discountCoupons()
    {
        return $this->morphMany(DiscountCoupon::class, 'discountable');
    }

    // Auto-generate slug if not provided
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });
    }
}
