<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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


    // public function store()
    // {
    //     $movie = new Movie();
    //     $movie->title  = request('title');
    //     $movie->director  = request('director');
    //     $movie->sypnosis  = request('sypnosis');
    //     $movie->duration_min  = request('duration');
    //     $movie->age  = request('age');

    //     $movie->save();

    //     return redirect('/');
    // }

    public function store(Request $request)
    {
        $movie = new Movie();
        $in = $request->only(['title', 'director', 'sypnosis', 'duration_min', 'age']);
        $movie->insert($in);
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $in = $request->all();
        $movie->update($in);
        return redirect('/');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('movie.edit', ['movie' => $movie]);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrfail($id);
        $movie->delete();
        return redirect('/');
    }
}
