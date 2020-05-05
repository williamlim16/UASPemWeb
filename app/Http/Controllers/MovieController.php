<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', ['movies' => $movies]);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movie.show', ['movie' => $movie]);
    }


    public function store()
    {
        $movie = new Movie();
        $movie->title  = request('title');
        $movie->director  = request('director');
        $movie->sypnosis  = request('sypnosis');
        $movie->duration_min  = request('duration');
        $movie->age  = request('age');

        $movie->save();

        return redirect('/');
    }
}
