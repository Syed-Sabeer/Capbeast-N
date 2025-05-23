<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCustomization extends Model
{
  use HasFactory;

  protected $table = 'user_customizations'; // Define table name

  protected $fillable = ['user_id', 'ipaddress', 'product_id', 'product_color_id', 'quantity', 'size', 'front_image', 'back_image', 'left_image', 'right_image', 'price', 'cart_id','front_font','back_font','left_font','right_font']; // Allow mass assignment

  public function customizerUploads()
  {
    return $this->hasMany(CustomizerUpload::class, 'user_customization_id');
  }

  public function orderItem()
  {
    return $this->hasOne(OrderItem::class, 'user_customization_id');
  }
}
