<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieTiming extends Model
{
    protected $fillable = [
        'cinema_id',
        'movie_id',
        'timing',
    ];

    // Relationship to Cinema model
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    // Relationship to Movie model
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
