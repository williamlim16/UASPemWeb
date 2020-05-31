<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Reservation;


class HistoryController extends Controller
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
    public function index($userid)
    {
        $reservation = DB::table('reservation')
                ->join('seat', 'seat.id', '=', 'reservation.seat_id')
                ->join('screening', 'screening.id', '=', 'reservation.screening_id')
                ->join('auditorium', 'auditorium.id', '=', 'screening.auditorium_id')
                ->join('movie', 'movie.id', '=', 'screening.movie_id')
                ->select('reservation.created_at as created_at',
                        'movie.title as title',
                        'movie.age as age',
                        'movie.posterpath as posterpath',
                        'screening.date as date',
                        'screening.time as time',
                        'auditorium.name as audit',
                        DB::raw('CONCAT(seat.row, seat.number) as seat')
                )->where('user_id', $userid)->get();
        return view('reserve.history', ['data'=>$reservation]);
    }

}
