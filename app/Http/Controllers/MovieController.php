<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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
}
