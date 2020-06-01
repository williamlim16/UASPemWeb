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

//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
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
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
    public function index()
    {
        return view('admin.dashboard');
    }
//    //=========================[[[MOVIE]]]=========================
//    public function movie(Request $request){
//        if ($request->ajax()) {
//            $data = DB::table('movie')->get();
//            for($i = 0; $i < count($data); $i++){
//                $data[$i]->categories = str_replace( array('[', ']', '"'),' ',$data[$i]->categories);
//                $data[$i]->casts = str_replace( array('[', ']', '"'),' ',$data[$i]->casts);
//            }
//            // $this->info($data);
//            return Datatables::of($data)
//                    ->addIndexColumn()
//                    ->addColumn('action', function($row){
//                            $btn = '<a href="movie/edit/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
//                            $btn = $btn.' <a href="movie/delete/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
//                            return $btn;
//                    })
//                    ->addColumn('thumbnail', function($row){
//                        $img = '<img src=/'.$row->posterpath.' style="width:50px;height:50px">';
//                        return $img;
//                    })
//                    ->rawColumns(['thumbnail', 'action'])
//                    ->make(true);
//        }
//        return view('admin.movie.index');
//    }
//
//    public function movieCreate(){
//        return view('admin.movie.create');
//    }
//    // public function movieDetail($movieId){
//    //     $data = Movie::find($movieId);
//    //     return view('admin.movie.detail', ['movie' => $data]);
//    // }
//    public function movieInsert(Request $request){
//        $movie = new Movie();
//        $in = $request->only(['title', 'director', 'synopsis', 'time', 'age', 'categories', 'casts', 'posterpath']);
//        $file = $request->file('poster');
//        $filename = $in['title'].".".$file->getClientOriginalExtension();
//        $filename = str_replace(' ', '',$filename);
//        $target = 'movie/img';
//        $file->move($target,$filename);
//        $in['posterpath'] = 'movie/img/'.$filename;
//        $in['categories'] = '["'.str_replace(',', '","', str_replace(', ', ',', $in['categories'])).'"]';
//        $in['casts'] = '["'.str_replace(',', '","', str_replace(', ', ',', $in['casts'])).'"]';
//        $movie->insert($in);
//        // $movie->save();
//        return redirect('/admin/movie/success');
//    }
//    public function movieEdit($id){
//        $movie = Movie::find($id);
//        $casts = '';
//        foreach($movie->casts as $index=>$actor){
//            if($index == 0){
//                $casts = $actor;
//            }
//            else $casts = $casts.','.$actor;
//        }
//        $categories = '';
//        foreach($movie->categories as $index=>$genre){
//            if($index == 0){
//                $categories = $genre;
//            }
//            else $categories = $categories.','.$genre;
//        }
//        $movie->categories = $categories;
//        $movie->casts = $casts;
//        return view('admin.movie.edit', ['movie' => $movie]);
//    }
//    public function movieEditPoster($id){
//        $movie = Movie::find($id);
//        return view('admin.movie.poster', ['movie' => $movie]);
//    }
//    public function movieEditPosterInsert(Request $req, $id){
//        $movie = Movie::find($id);
//        $file = $req->file('poster');
//        $filename = $movie['title'].".".$file->getClientOriginalExtension();
//        $target = 'movie/img';
//        $file->move($target,$filename);
//        DB::table('movie')->where('id',$id)->update(['posterpath'=>"movie/img/".$filename]);
//        return redirect('/admin/movie/success');
//    }
//    public function movieDestroy($id){
//        $movie = Movie::findOrfail($id);
//        $movie->delete();
//        return redirect('/admin/movie/');
//    }
//    public function movieSuccess(){
//        return view('admin.movie.success');
//    }
//
//    //=========================[[[SCREENING AND TICKETING]]]=========================
//    public function screening(Request $request){
//        if ($request->ajax()) {
//            $data = DB::table('screening')
//                    ->join('movie', 'screening.movie_id', '=', 'movie.id')
//                    ->join('auditorium', 'screening.auditorium_id', '=', 'auditorium.id')
//                    ->select('screening.id as sId',
//                        'screening.date as sDate',
//                        'screening.time as sTime',
//
//                        'movie.id as mId',
//                        'movie.title as title',
//                        'movie.posterpath as posterpath',
//                        'movie.time as duration',
//                        'movie.age as age',
//                        'movie.categories as categories',
//
//                        'auditorium.id as aId',
//                        'auditorium.name as aName',
//                        'auditorium.seats_no as seats')
//                    ->get();
//            for($i = 0; $i < count($data); $i++){
//                $data[$i]->categories = str_replace( array('[', ']', '"'),'',$data[$i]->categories);
//                $data[$i]->booked = DB::table('reservation')->selectRaw('count(*) as count')->where('screening_id', $data[$i]->sId)->groupBy('screening_id')->first();
//            }
//
//
//            // $this->info($data);
//            return Datatables::of($data)
//                    ->addIndexColumn()
//                    ->addColumn('action', function($row){
//                            $btn = '<a href="screening/edit/'.$row->sId.'" data-toggle="tooltip"  data-id="'.$row->sId.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
//                            $btn = $btn.' <a href="screening/delete/'.$row->sId.'" data-toggle="tooltip"  data-id="'.$row->sId.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
//                            return $btn;
//                    })
//                    // ->addColumn('thumbnail', function($row){
//                    //     $img = '<img src=/'.$row->posterpath.' style="width:50px;height:50px">';
//                    //     return $img;
//                    // })
//                    // ->rawColumns(['thumbnail'])
//                    ->rawColumns(['action'])
//                    ->make(true);
//        }
//        // $a = DB::table('reservation')->selectRaw('count(*)')->groupBy('screening_id')->get();
//        return view('admin.screening.index');
//    }
//    public function screeningCreate(Request $request){
//        $movies = Movie::all();
//        $audi = Auditorium::all();
//        return view('admin.screening.create', ['movie' => $movies, 'audi' => $audi]);
//    }
//    public function screeningDetail($screeningId){
//        $data = Screening::find($screeningId);
//        $movies = Movie::all();
//        $audi = Auditorium::all();
//        return view('admin.screening.detail', ['screening' => $data, 'movie' => $movies, 'audi' => $audi]);
//    }
//    public function screeningInsert(Request $request){
//        $screening = new Screening();
//        $in = $request->only(['id', 'movie_id', 'auditorium_id', 'date', 'time']);
//        $screening->insert($in);
//        // $screening->save();
//        return redirect('/admin/screening/success');
//    }
//    public function screeningEdit($id){
//        $screening = Screening::find($id);
//        $movies = Movie::all();
//        $audi = Auditorium::all();
//        return view('admin.screening.edit', ['screening' => $screening, 'movie' => $movies, 'audi' => $audi]);
//    }
//    public function screeningDestroy($id){
//        $reserve = Reservation::where('screening_id', $id)->delete();
//        $screening = Screening::findOrfail($id);
//        $screening->delete();
//        return redirect('/admin/screening/');
//    }
//    public function screeningSuccess(){
//        $latest = Screening::orderBy("id", "DESC")->first();
//        $movie = Movie::find($latest->movie_id);
//        $audi = Auditorium::find($latest->auditorium_id);
//        return view('admin.screening.success', ['latest' => $latest, 'movie'=>$movie, 'audi' => $audi]);
//    }
//
//    public function ticketTable(Request $request){
//        if ($request->ajax()) {
//            $data = DB::table('reservation')
//                    ->join('users', 'reservation.user_id', '=', 'users.id')
//                    ->join('seat', 'reservation.seat_id', '=', 'seat.id')
//                    ->select('reservation.screening_id as screeningId',
//                        'reservation.seat_id as seatId',
//                        'reservation.user_id as userId',
//                        'reservation.created_at as created_at',
//
//                        'users.name as name',
//                        'users.email as email',
//
//                        DB::raw('CONCAT(seat.row," ",seat.number) as seat')
//                        )
//                    ->get();
//
//            return Datatables::of($data)
//                    ->addIndexColumn()
//                    ->addColumn('action', function($row){
//                            $btn = '<a href="/admin/screening/ticket/edit/'.$row->screeningId.'/'.$row->seatId.'" data-toggle="tooltip"  data-id="'.$row->screeningId.'|'.$row->seatId.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
//                            $btn = $btn.' <a href="/admin/screening/ticket/delete/'.$row->screeningId.'/'.$row->seatId.'" data-toggle="tooltip"  data-id="'.$row->screeningId.'|'.$row->seatId.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
//                            return $btn;
//                    })
//                    ->rawColumns(['action'])
//                    ->make(true);
//        }
//    }
//    public function ticketCreate(){
//        $screening = DB::table('screening')
//                    ->join('movie', 'movie.id', '=', 'screening.movie_id')
//                    ->join('auditorium', 'auditorium.id' , '=', 'screening.auditorium_id')
//                    ->select('movie.id as mId',
//                    'movie.title as title',
//
//                    'screening.id as sId',
//                    'screening.date as date',
//                    'screening.time as time',
//                    'screening.auditorium_id as aId',
//                    'auditorium.name as aName')
//                ->get();
//        $users = DB::table('users')->get();
//
//        return view('admin.screening.createTicket', ['screenings' => $screening, 'users' => $users]);
//    }
//    public function ticketSeat(Request $request){
//        $arr = explode(',', $request->id);
//        $sId = $arr[0];//screening Id
//        $aId = $arr[1];//audi Id
//
//
//        $taken =  DB::table('reservation')->where('screening_id', '=', $sId)->pluck('seat_id')->toArray();
//
//        $available = DB::table('seat')
//                ->select('id',
//                        'row',
//                        'number')
//                ->whereNotIn('id', $taken)
//                ->where('auditorium_id', '=', $aId)
//                ->get();
//        return response()->json(['data' => $available]);
//    }
//    public function ticketInsert(Request $request){
//        $reservation = new Reservation();
//        $in = $request->only(['screening_id', 'seat_id', 'user_id']);
//        $reservation->insert($in);
//        // $reservation->save();
//        return redirect('/admin/screening/success');
//    }
//    public function ticketEdit($screening_id, $seat_id){
//        $curr = DB::table('reservation')->where('screening_id', '=', $screening_id)
//                        ->where('seat_id','=', $seat_id)->first();
//                        // ->get();
//        $screening = Screening::where('id', $screening_id)
//                        ->first();
//        $seat = DB::table('seat')->where('id', $seat_id)
//                        ->first();
//        $users = DB::table('users')->get();
//        $movie = DB::table('movie')->where('id', $screening->movie_id)->first();
//        $audi = DB::table('auditorium')->where('id', $screening->auditorium_id)->first();
//        return view('admin.screening.editTicket',  ['screening' => $screening, 'users' => $users, 'seat'=>$seat, 'curr' => $curr, 'movie'=>$movie, 'audi'=>$audi]);
//    }
//    public function ticketDestroy($screening_id, $seat_id){
//        $reservation = Reservation::where('screening_id', $screening_id)
//            ->where('seat_id', $seat_id)
//            ->delete();
//        return redirect('/admin/screening/');
//    }
//    public function ticketUpdate(Request $request, $screening_id, $seat_id){
//        $reservation = Reservation::where('screening_id', $screening_id)->where('seat_id', $seat_id);
//        $in = $request->only(['user_id']);
//
//        $reservation->update($in);
//        // $reservation->save();
//        return redirect('/admin/screening/success');
//    }
//
//    //=========================[[[AUDITORIUM, ETC]]]=========================
//    public function facility(Request $request){
//        if ($request->ajax()) {
//            $data = DB::table('auditorium')
//                    ->leftJoin('screening', 'screening.auditorium_id', '=', 'auditorium.id')
//                    ->select(array('auditorium.id as id',
//                            'auditorium.name as name',
//                            'auditorium.seats_no as seats_no',
//                            DB::raw('count(screening.id) as use_count'))
//                    )->groupBy(['auditorium.id', 'auditorium.name', 'auditorium.seats_no'])
//                    ->get();
//            return Datatables::of($data)
//                    ->addIndexColumn()
//                    ->addColumn('action', function($row){
//                            // $btn = '<a href="facility/edit/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
//                            $btn = ' <a href="facility/delete/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
//                            return $btn;
//                    })
//                    ->rawColumns(['action'])
//                    ->make(true);
//        }
//        return view('admin.facility.index');
//    }
//
//    public function facilityCreate(){
//        return view('admin.facility.create');
//    }
//
//    public function facilityInsert(Request $request){
//        $f = new Auditorium();
//        $in = $request->only(['name', 'seats_no']);
//
//        $f->insert($in);
//        //create seats
//
//        $id = DB::table('auditorium')->select('id')->latest('id')->first();
//        $id = $id->id;
//        $row = $request->only('row')['row'];
//        $count = $request->only('seats_no')['seats_no'];
//
//        $char = 'A';
//        $data = array();
//        $curr = 1;
//        for($i = 0; $i < $count; $i++){
//            $data[] = ['row'=>$char, 'number'=>$curr, 'auditorium_id'=>$id];
//            $curr++;
//            if($curr > $row){
//                if($char == 'Z') $char = 'a';
//                else $char++;
//                $curr = 1;
//            }
//        }
//        DB::table('seat')->insert($data);
//
//        return view('/admin/facility/success', ['a'=>$row]);
//    }
//
//    public function facilityDestroy($id){
//        $seat = DB::table('seat')->where('auditorium_id', $id)->delete();
//        $reserve = Auditorium::findOrfail($id);
//        $reserve->delete();
//        return redirect('/admin/facility/');
//    }
//
//    public function facilitySuccess(){
//        return view('admin.facility.success');
//    }

    //=========================[[[STATISTIC]]]=========================
    public function statistics(){

    }

    public function success(){
        return view('admin.success');
    }


}
