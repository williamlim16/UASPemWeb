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

   
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('movie.show', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $in = $request->all();
        $in['categories'] = explode(',', $in['categories']);
        $in['casts'] = explode(',', $in['casts']);
        $movie->update($in);
        $movie->save();
        return redirect('/admin/movie/success');
    }

    
}
