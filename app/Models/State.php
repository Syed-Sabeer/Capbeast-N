<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'country_code',
        'code',
        'name'
    ];

    public $timestamps = false;
}
