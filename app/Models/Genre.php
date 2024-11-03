<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'genre',
        'movie_id',
    ];

    // Relationship with Movie model
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
