<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $fillable = [
        'name',
        'description',
        'picture',
    ];

    public function movieTiming()
    {
        return $this->hasMany(MovieTiming::class);
    }
}
