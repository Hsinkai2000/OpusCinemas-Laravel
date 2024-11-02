<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\MovieTiming;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show_booking_page($id)
    {
        $movie = Movie::with('movieTiming.cinema')->find($id);

        $cinemas = [];
        foreach ($movie->movieTiming as $timing) {

            if (!in_array($timing->cinema->name, array_column($cinemas, 'name'))) {
                $cinemas[] = $timing->cinema;
            }
        }

        return view('booking', ['movie' => $movie, 'cinemas' => $cinemas]);
    }

    public function showPaymentView(Request $request)
    {
        $params = $request->all(); // Retrieves query parameters from the request
        $movie = Movie::find($params['movie_id']);
        $cinema = Cinema::find($params['cinema_id']);
        $timing = $params['timing'];
        $seats = $params['seats'];

        return view('payment', [
            'movie' => $movie,
            'cinema' => $cinema,
            'timing' => $timing,
            'seats' => $seats
        ]);
    }
}
