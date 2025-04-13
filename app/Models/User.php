<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'country',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Automatically hash password when set
    // public function setPasswordAttribute($value)
    // {
    //     if (!empty($value)) {
    //         $this->attributes['password'] = bcrypt($value);
    //     }
    // }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function userWishlist()
    {
      return $this->hasMany(UserWishlist::class, 'user_id');
    }
}
