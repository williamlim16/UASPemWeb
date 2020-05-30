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
            'sort_type' => 'Latest'
        ]);
    }

    public function sort($sort)
    {
        if ($sort == 'latest') {
            $movies = Movie::orderBy('id', 'desc')->get();
        } else if ($sort == 'alphabetical') {
            $movies = Movie::orderBy('title')->get();
        } else {
            $movies = Movie::orderBy('id', 'asc')->get();
        }
        return view('welcome', [
            'movies' => $movies,
            'sort_type' => $sort
        ]);
    }
}
