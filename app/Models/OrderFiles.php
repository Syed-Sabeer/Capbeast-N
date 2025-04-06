<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFiles extends Model
{
    use HasFactory;

    protected $table = 'order_files';

    protected $fillable = [
        'order_id',
        'title',
        'file',
        
    ];

    public function case()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
