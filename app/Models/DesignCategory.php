<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignCategory extends Model
{
    use HasFactory;

    protected $table = 'design_categories';

    // Fields that can be mass-assigned
    protected $fillable = ['name', 'status'];


    public function customizerDesigns()
    {
      return $this->hasMany(CustomizerDesign::class, 'design_category_id');
    }
}
