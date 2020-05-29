<?php

namespace App\Http\Controllers;
use Response;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;

use App\Movie;
use App\Screening;
use App\Auditorium;
use App\Reservation;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Gate::allows('admin-access')){ //not authorized as admin, declared in AuthServiceProvider.php
                abort(403, 'Unauthorized action.');
            }
            else{
                return $next($request);
            }
        });
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        return view('admin.dashboard');
    }
    //=========================[[[MOVIE]]]=========================
    public function movie(Request $request){
        if ($request->ajax()) {
            $data = DB::table('movie')->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i]->categories = str_replace( array('[', ']', '"'),' ',$data[$i]->categories);
                $data[$i]->casts = str_replace( array('[', ']', '"'),' ',$data[$i]->casts);
            }
            // $this->info($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="movie/edit/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                            $btn = $btn.' <a href="movie/delete/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                            return $btn;
                    })
                    ->addColumn('thumbnail', function($row){
                        $img = '<img src=/'.$row->posterpath.' style="width:50px;height:50px">';
                        return $img;
                    })
                    ->rawColumns(['thumbnail', 'action'])
                    ->make(true);
        }
        return view('admin.movie.index');
    }
    public function movieCreate(Request $request){
        return view('admin.movie.create');  
    }
    // public function movieDetail($movieId){
    //     $data = Movie::find($movieId);
    //     return view('admin.movie.detail', ['movie' => $data]);
    // }
    public function movieInsert(Request $request){
        $movie = new Movie();
        $in = $request->only(['title', 'director', 'synopsis', 'time', 'age', 'categories', 'casts', 'posterpath']);

        $in['categories'] = '["'.str_replace(',', '","', str_replace(', ', ',', $in['categories'])).'"]';
        $in['casts'] = '["'.str_replace(',', '","', str_replace(', ', ',', $in['casts'])).'"]';
        $movie->insert($in);
        // $movie->save();
        return redirect('/admin/movie/success');
    }
    public function movieEdit($id){
        $movie = Movie::find($id);
        $casts = '';
        foreach($movie->casts as $index=>$actor){
            if($index == 0){
                $casts = $actor;
            }
            else $casts = $casts.','.$actor;
        }
        $categories = '';
        foreach($movie->categories as $index=>$genre){
            if($index == 0){
                $categories = $genre;
            }
            else $categories = $categories.','.$genre;
        }
        $movie->categories = $categories;
        $movie->casts = $casts;
        return view('admin.movie.edit', ['movie' => $movie]);
    }
    public function movieDestroy($id){
        $movie = Movie::findOrfail($id);
        $movie->delete();
        return redirect('/admin/movie/');
    }
    public function movieSuccess(){
        return view('admin.movie.success');
    }

    //=========================[[[SCREENING AND TICKETING]]]=========================
    public function screening(Request $request){
        if ($request->ajax()) {
            $data = DB::table('screening')
                    ->join('movie', 'screening.movie_id', '=', 'movie.id')
                    ->join('auditorium', 'screening.auditorium_id', '=', 'auditorium.id')
                    ->select('screening.id as sId', 
                        'screening.date as sDate', 
                        'screening.time as sTime', 

                        'movie.id as mId',
                        'movie.title as title', 
                        'movie.posterpath as posterpath', 
                        'movie.time as duration', 
                        'movie.age as age', 
                        'movie.categories as categories', 

                        'auditorium.id as aId', 
                        'auditorium.name as aName', 
                        'auditorium.seats_no as seats')
                    ->get();
            for($i = 0; $i < count($data); $i++){
                $data[$i]->categories = str_replace( array('[', ']', '"'),'',$data[$i]->categories);
                $data[$i]->booked = DB::table('reservation')->selectRaw('count(*) as count')->where('screening_id', $data[$i]->sId)->groupBy('screening_id')->first();
            }
            

            // $this->info($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '<a href="screening/edit/'.$row->sId.'" data-toggle="tooltip"  data-id="'.$row->sId.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                            $btn = $btn.' <a href="screening/delete/'.$row->sId.'" data-toggle="tooltip"  data-id="'.$row->sId.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                            return $btn;
                    })
                    // ->addColumn('thumbnail', function($row){
                    //     $img = '<img src=/'.$row->posterpath.' style="width:50px;height:50px">';
                    //     return $img;
                    // })
                    // ->rawColumns(['thumbnail'])
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // $a = DB::table('reservation')->selectRaw('count(*)')->groupBy('screening_id')->get();
        return view('admin.screening.index');
    }
    public function screeningCreate(Request $request){
        $movies = Movie::all();
        $audi = Auditorium::all();
        return view('admin.screening.create', ['movie' => $movies, 'audi' => $audi]);  
    }
    public function screeningDetail($screeningId){
        $data = Screening::find($screeningId);
        $movies = Movie::all();
        $audi = Auditorium::all();
        return view('admin.screening.detail', ['screening' => $data, 'movie' => $movies, 'audi' => $audi]);
    }
    public function screeningInsert(Request $request){
        $screening = new Screening();
        $in = $request->only(['id', 'movie_id', 'auditorium_id', 'date', 'time']);
        $screening->insert($in);
        // $screening->save();
        return redirect('/admin/screening/success');
    }
    public function screeningEdit($id){
        $screening = Screening::find($id);
        $movies = Movie::all();
        $audi = Auditorium::all();
        return view('admin.screening.edit', ['screening' => $screening, 'movie' => $movies, 'audi' => $audi]);
    }
    public function screeningDestroy($id){
        $screening = Screening::findOrfail($id);
        $screening->delete();
        return redirect('/admin/screening/');
    }
    public function screeningSuccess(){
        $latest = Screening::orderBy("id", "DESC")->first();
        $movie = Movie::find($latest->movie_id);
        $audi = Auditorium::find($latest->auditorium_id);
        return view('admin.screening.success', ['latest' => $latest, 'movie'=>$movie, 'audi' => $audi]);
    }

    public function ticketTable(Request $request){
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
                    ->addColumn('action', function($row){
                            $btn = '<a href="/admin/screening/ticket/edit/'.$row->screeningId.'/'.$row->seatId.'" data-toggle="tooltip"  data-id="'.$row->screeningId.'|'.$row->seatId.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                            $btn = $btn.' <a href="/admin/screening/ticket/delete/'.$row->screeningId.'/'.$row->seatId.'" data-toggle="tooltip"  data-id="'.$row->screeningId.'|'.$row->seatId.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    //=========================[[[AUDITORIUM, ETC]]]=========================
    public function facility(){

    }


    //=========================[[[STATISTIC]]]=========================
    public function statistics(){

    }

    
}
