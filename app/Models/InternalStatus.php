<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalStatus extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name explicitly
    protected $table = 'internal_status';

    // Fields that can be mass-assigned
    protected $fillable = ['title', 'description'];
}
