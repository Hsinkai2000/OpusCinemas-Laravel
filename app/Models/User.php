<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password', // Hide the password field when serializing
    ];
}
