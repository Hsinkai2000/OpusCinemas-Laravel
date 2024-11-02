<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Genre;

class Movie extends Model
{
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
    public function Genre()
    {
        return $this->hasMany(Genre::class);
    }
}
