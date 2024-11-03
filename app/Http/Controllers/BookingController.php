<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\MovieTiming;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        \Log::info($params['seats']);
        $seats = explode(',', $params['seats']);

        return view('payment', [
            'movie' => $movie,
            'cinema' => $cinema,
            'timing' => $timing,
            'seats' => $seats
        ]);
    }

    public function makeBooking(Request $request)
    {
        $params = $request->all();
        $movie = Movie::find($params['movie_id']);
        $cinema = Cinema::find($params['cinema_id']);
        $timing = $params['timing'];
        $seats = $params['seats'];
        $name = $params['name'];
        $email = $params['email'];
        $user_id = Auth::user()->id ?? null;

        $movieTiming = MovieTiming::where(['cinema_id' => $cinema->id], ['movie_id' => $movie->id], ['timing' => $timing])->first();

        $booking = Booking::create([
            'user_id' => $user_id,
            'movie_timing_id' => $movieTiming->id,
            'price' => 9 * count($seats),
            'name' => $name,
            'email' => $email
        ]);

        $booking->save();

        \Log::info($booking);

        foreach ($seats as $seat) {
            $seat = Seat::create([
                'booking_id' => $booking->id,
                'seat' => $seat
            ]);
            $seat->save();
            \Log::info($seat);
        }

        return Response::json(['message' => 'Booking created successfully'], 200);
    }
}
