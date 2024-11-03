<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Genre;

class Movie extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'director',
        'actors',
        'writers',
        'isUpcoming',
        'picture',
    ];



    // Relationship with Movie model
    public function genre()
    {
        return $this->hasMany(Genre::class);
    }

    public function movieTiming()
    {
        return $this->hasMany(MovieTiming::class);
    }
}
