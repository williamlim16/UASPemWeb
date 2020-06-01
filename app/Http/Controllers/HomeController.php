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

    public function show($id)
    {
        $movie = Movie::find($id);
        $screening = DB::table('screening')->where('movie_id', $id)->pluck('id');
        $counter = count($screening);
        $screening_room = DB::table('screening')->where('movie_id', $id)->pluck('auditorium_id');
        if(!$screening->isEmpty()) {
            $i = 0;
            while(true) {
                $seat = DB::table('auditorium')->where('id', $screening_room[$i])->value('seats_no');
                $count_tickets = DB::table('reservation')->where('screening_id', $screening[$i])->count();
                if($count_tickets >= $seat) {
                    $i++;
                    if($i >= $counter) {
                        $screening = '';
                        break;
                    }
                    continue;
                } else if($count_tickets < $seat) {
                    $screening = $screening[$i];
                    break;
                }
            }

        } else if($screening->isEmpty()) {
            $screening = '';
        }

        return view('movie.show', [
            'movie' => $movie,
            'screening' => $screening
        ]);
    }
}
