<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mlb extends Model
{
    use HasFactory;

    protected $table = 'mlb';
    protected $fillable = ['title', 'description', 'image', 'visibility'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }
    

}
