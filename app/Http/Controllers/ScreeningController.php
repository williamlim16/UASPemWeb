<?php

namespace App\Http\Controllers;

use App\Auditorium;
use App\Movie;
use App\Reservation;
use Illuminate\Http\Request;
use App\Screening;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ScreeningController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {

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
                    $btn = '<a href="/admin/screening/'.$row->sId.'/edit" data-toggle="tooltip"  data-id="'.$row->sId.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn.'<form action="/admin/screening/' . $row->sId . '"method="POST">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Delete" class="btn btn-danger">
</form>';
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


    public function update(Request $request, $id)
    {
        $screening = Screening::find($id);
        $in = $request->all();
        $screening->update($in);
        $screening->save();
        return redirect('/admin/success');
    }

    public function create()
    {
        $movies = Movie::all();
        $audi = Auditorium::all();
        return view('admin.screening.create', ['movie' => $movies, 'audi' => $audi]);
    }

    public function store(Request $request)
    {
        $screening = new Screening();
        $in = $request->only(['id', 'movie_id', 'auditorium_id', 'date', 'time']);
        $screening->insert($in);
        return redirect('/admin/success');
    }

    public function edit($id)
    {
        $screening = Screening::find($id);
        $movies = Movie::all();
        $audi = Auditorium::all();
        return view('admin.screening.edit', ['screening' => $screening, 'movie' => $movies, 'audi' => $audi]);
    }

    public function destroy($id){
        $reserve = Reservation::where('screening_id', $id)->delete();
        $screening = Screening::findOrfail($id);
        $screening->delete();
        return redirect('/admin/screening/');
    }

}
