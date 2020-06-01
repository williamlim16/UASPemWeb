<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Screening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(!Gate::allows('admin-access')){ //not authorized as admin, declared in AuthServiceProvider.php
                abort(403, 'Unauthorized action.');
            }
            else{
                return $next($request);
            }
        });
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('reservation')
                ->join('users', 'reservation.user_id', '=', 'users.id')
                ->join('seat', 'reservation.seat_id', '=', 'seat.id')
                ->select('reservation.screening_id as screeningId',
                    'reservation.seat_id as seatId',
                    'reservation.user_id as userId',
                    'reservation.created_at as created_at',

                    'users.name as name',
                    'users.email as email',

                    DB::raw('CONCAT(seat.row," ",seat.number) as seat')
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/admin/tickets/edit/' . $row->screeningId . '/' . $row->seatId . '" data-toggle="tooltip"  data-id="' . $row->screeningId . '|' . $row->seatId . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . '<form action="/admin/tickets/edit/' . $row->screeningId . '/' . $row->seatId . '"method="POST">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Delete" class="btn btn-danger">
</form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $screening = DB::table('screening')
            ->join('movie', 'movie.id', '=', 'screening.movie_id')
            ->join('auditorium', 'auditorium.id', '=', 'screening.auditorium_id')
            ->select('movie.id as mId',
                'movie.title as title',

                'screening.id as sId',
                'screening.date as date',
                'screening.time as time',
                'screening.auditorium_id as aId',
                'auditorium.name as aName')
            ->get();
        $users = DB::table('users')->get();

        return view('admin.screening.createTicket', ['screenings' => $screening, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $in = $request->only(['screening_id', 'seat_id', 'user_id']);
        $reservation->insert($in);
        return redirect('/admin/success');
    }

    public function destroy($screening_id, $seat_id)
    {
        $reservation = Reservation::where('screening_id', $screening_id)
            ->where('seat_id', $seat_id)
            ->delete();
        return redirect('/admin/screening/');
    }

    public function edit($screening_id, $seat_id)
    {
        $curr = DB::table('reservation')->where('screening_id', '=', $screening_id)
            ->where('seat_id', '=', $seat_id)->first();
        // ->get();
        $screening = Screening::where('id', $screening_id)
            ->first();
        $seat = DB::table('seat')->where('id', $seat_id)
            ->first();
        $users = DB::table('users')->get();
        $movie = DB::table('movie')->where('id', $screening->movie_id)->first();
        $audi = DB::table('auditorium')->where('id', $screening->auditorium_id)->first();
        return view('admin.screening.editTicket', ['screening' => $screening, 'users' => $users, 'seat' => $seat, 'curr' => $curr, 'movie' => $movie, 'audi' => $audi]);
    }

    public function update(Request $request, $screening_id, $seat_id)
    {
        $reservation = Reservation::where('screening_id', $screening_id)->where('seat_id', $seat_id);
        $in = $request->only(['user_id']);

        $reservation->update($in);
        // $reservation->save();
        return redirect('/admin/success');
    }

    public function seats(Request $request)
    {
        $arr = explode(',', $request->id);
        $sId = $arr[0];//screening Id
        $aId = $arr[1];//audi Id
        $taken = DB::table('reservation')->where('screening_id', '=', $sId)->pluck('seat_id')->toArray();

        $available = DB::table('seat')
            ->select('id',
                'row',
                'number')
            ->whereNotIn('id', $taken)
            ->where('auditorium_id', '=', $aId)
            ->get();
        return response()->json(['data' => $available]);
    }
}
