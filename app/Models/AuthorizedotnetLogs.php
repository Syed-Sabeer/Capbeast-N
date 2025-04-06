<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizedotnetLogs extends Model
{
    use HasFactory;

    
    protected $table = 'authorizedotnet_logs'; // Specify the correct table name

    protected $fillable = [
        'name_of_card',
        'amount',
        'response_code',
        'transaction_id',
        'auth_id',
        'message_code',
        'qty',
        
    ];
}
