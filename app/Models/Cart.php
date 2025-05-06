<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use HasFactory;


  protected $table = 'cart';
  protected $fillable = [
    'user_id',
    'product_id',
    'color_id',
    'quantity',
    'size',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id')
      ->select(['id', 'title','sku', 'slug', 'selling_price', 'visibility',]);
  }
  public function userCustomization()
  {
    return $this->hasOne(UserCustomization::class, 'cart_id');
  }
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function color()
  {
    return $this->belongsTo(ProductColor::class, 'color_id');
  }

  public function printing()
  {
    return $this->belongsTo(ProductPrinting::class, 'printing_id');
  }
}
