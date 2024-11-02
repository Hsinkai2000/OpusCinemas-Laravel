<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function show_cinemas()
    {
        $cinemas = Cinema::get();
        return view('cinema')->with(['cinemas' => $cinemas]);
    }
}
