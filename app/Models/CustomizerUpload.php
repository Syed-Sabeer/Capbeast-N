<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomizerUpload extends Model
{
    use HasFactory;

    protected $table = 'customizer_uploads'; // Define table name

    protected $fillable = ['user_customization_id','image']; // Allow mass assignment
}
