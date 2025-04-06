<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPSTaxPrice extends Model
{
    use HasFactory;
    
    protected $table = 'tps_tax_price'; // Define table name

    protected $fillable = ['taxno','percentage']; // Allow mass assignment
}
