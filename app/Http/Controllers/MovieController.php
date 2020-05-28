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
        $movies = Movie::all(); //retrieve all

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

    public function store(Request $request)
    {
        $movie = new Movie();
        $in = $request->only(['title', 'director', 'sypnosis', 'time', 'age', 'categories', 'casts', 'posterpath']);
        $movie->insert($in);
        $movie->save();
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
