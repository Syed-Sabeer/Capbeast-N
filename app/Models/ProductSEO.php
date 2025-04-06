<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSEO extends Model
{
    use HasFactory;
    protected $table = 'product_seo';

    protected $fillable = [
        'product_id',
        'metatitle',
        'metadescription',
        'metakeywords',
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }

}
