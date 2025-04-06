<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderArtwork extends Model
{
    use HasFactory;

    protected $table = 'order_artwork';

    protected $fillable = [
        'order_item_id',
        'artwork_type',
        'artwork_dataText',
        'artwork_dataImage',
        'patch_length',
        'patch_height',
        'font_style',
        'num_of_imprint',
        'imprint_color',
        'leathercolor',
    ];

    protected $casts = [
        'imprint_color' => 'array',
        'patch_length' => 'float',
        'patch_height' => 'float',
    ];

    /**
     * Relationship with OrderItem
     */
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id');
    }
}
