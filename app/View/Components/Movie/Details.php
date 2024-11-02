<?php

namespace App\View\Components\Movie;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Movie;

class Details extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Movie $movie, public Movie $movies)
    {
        $this->movie = $movie;
        $this->movies = $movies;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movie.details');
    }
}
