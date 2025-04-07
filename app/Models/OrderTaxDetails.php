<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTaxDetails extends Model
{
    use HasFactory;

    protected $table = 'order_tax_details'; 

    protected $fillable = ['order_id','tps_tax_no','tps_tax_percentage','tps_tax_price','tvq_tax_no','tvq_tax_percentage','tvq_tax_price'];

}
