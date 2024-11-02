<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'email',
        'movie_timing_id',
        'name',
        'price',
        'user_id',
    ];

    // Add relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movieTiming()
    {
        return $this->belongsTo(MovieTiming::class);
    }

    public function seat()
    {
        return $this->hasMany(Seat::class);
    }
}
