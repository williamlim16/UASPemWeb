<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::orderBy('id', 'desc')->get();

        return view('welcome', [
            'movies' => $movies,
            // 'categories' => $categories,
            'sort_type' => 'Latest'
        ]);
    }

    public function sort($by)
    {
        if ($by == 'oldest') {
            $movies = Movie::orderBy('id', 'asc')->get();
        } else if ($by == 'alphabetical') {
            $movies = Movie::orderBy('title')->get();
        } else {
            $movies = Movie::orderBy('id', 'desc')->get();
        }

        return view('welcome', [
            'movies' => $movies,
            'sort_type' => $by
        ]);
    }

    public function show($id) //show movie details to users, the show($id) function in MovieController is for admin.
    {
        $movie = Movie::find($id);
        $screening = DB::table('screening')->where('movie_id', $id)->value('id');
        // $screening = DB::table('screening')->where('movie_id', $id)->pluck('id'); //array

        if($screening == '') {
            $screening = '';
        }

        return view('movie.show', [
            'movie' => $movie,
            'screening' => $screening
        ]);
    }
}
