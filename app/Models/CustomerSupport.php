<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerSupport extends Model
{
    protected $fillable = [
        'name',
        'email',
        'question',
    ];
}
