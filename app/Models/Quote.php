<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    // Define the correct table name if it’s not the plural form (quotes)
    protected $table = 'quote';

    // Mass assignable fields
    protected $fillable = [
        'customization_id',
        'product_id',
        'color_id',
         'user_id',
        'firstname',
        'lastname',
        'email',
        'address',
        'country',
        'state',
        'city',
        'zip',
        'phone',
        'details',
    ];

    // Relationships
    public function customization()
    {
        return $this->belongsTo(UserCustomization::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id');
    }
}
