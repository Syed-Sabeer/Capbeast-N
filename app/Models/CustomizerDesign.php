<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizerDesign extends Model
{
    use HasFactory;

    protected $table = 'customizer_designs';

    // Fields that can be mass-assigned
    protected $fillable = ['name', 'status', 'design_category_id', 'image'];

    public function designCategory()
    {
      return $this->belongsTo(DesignCategory::class, 'design_category_id');
    }
}
