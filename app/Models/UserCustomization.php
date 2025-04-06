<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCustomization extends Model
{
    use HasFactory;

    protected $table = 'user_customizations'; // Define table name

    protected $fillable = ['user_id','ipaddress','product_id','product_color_id','front_image','back_image','left_image','right_image','price']; // Allow mass assignment
}