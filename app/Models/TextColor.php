<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextColor extends Model
{
    use HasFactory;
    protected $table = 'text_colors'; // Define table name

    protected $fillable = ['color_name','text_color_code', 'color_image']; // Allow mass assignment
}