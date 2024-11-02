<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieTiming;
use App\Models\Seat;

class MovieController extends Controller
{
    public function show_home()
    {
        $movies = Movie::get();

        return view('home')->with(['movies' => $movies]);
    }

    public function show_now_showing()
    {
        $movies = Movie::where('isUpcoming', '0')->get();

        return view("nowshowing")->with(['movies' => $movies]);
    }

    public function show_movie_details($id)
    {

        $movie = Movie::where('id', $id)->first();
        $movies = Movie::get();

        return view('movieDetails')->with(['movie' => $movie, 'movies' => $movies]);
    }

    public function getMovieTimings(Movie $movie, $cinema_id)
    {
        $movieTimings = $movie->movieTiming()->where('cinema_id', $cinema_id)->get();
        return response()->json($movieTimings);
    }

    public function getTakenSeats($movieId, $cinemaId, $timing)
    {
        $seats = [];

        $movieTiming = MovieTiming::where([
            ['movie_id', '=', $movieId],
            ['cinema_id', '=', $cinemaId],
            ['timing', '=', $timing]
        ])->first();

        $bookings = Booking::where('movie_timing_id', $movieTiming->id)->get();

        foreach ($bookings as $booking) {
            $booking_seats = $booking->seat;

            foreach ($booking_seats as $seat) {

                $seats[] = $seat->seat;
            }
        }

        return response()->json($seats);
    }
}
