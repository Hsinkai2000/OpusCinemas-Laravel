<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'booking_id',
        'seat',
    ];

    // Relationship to Booking model
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
