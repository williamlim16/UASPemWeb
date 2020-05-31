<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorium;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class AuditoriumController extends Controller
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
            $data = DB::table('auditorium')
                ->leftJoin('screening', 'screening.auditorium_id', '=', 'auditorium.id')
                ->select(array('auditorium.id as id',
                        'auditorium.name as name',
                        'auditorium.seats_no as seats_no',
                        DB::raw('count(screening.id) as use_count'))
                )->groupBy(['auditorium.id', 'auditorium.name', 'auditorium.seats_no'])
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<form action="/admin/auditorium/' . $row->id . '"method="POST">
<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Delete" class="btn btn-danger">
</form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.facility.index');
    }

    public function create(){
        return view('admin.facility.create');
    }

    public function store(Request $request){
        $f = new Auditorium();
        $in = $request->only(['name', 'seats_no']);

        $f->insert($in);
        //create seats

        $id = DB::table('auditorium')->select('id')->latest('id')->first();
        $id = $id->id;
        $row = $request->only('row')['row'];
        $count = $request->only('seats_no')['seats_no'];

        $char = 'A';
        $data = array();
        $curr = 1;
        for($i = 0; $i < $count; $i++){
            $data[] = ['row'=>$char, 'number'=>$curr, 'auditorium_id'=>$id];
            $curr++;
            if($curr > $row){
                if($char == 'Z') $char = 'a';
                else $char++;
                $curr = 1;
            }
        }
        DB::table('seat')->insert($data);

        return redirect('/admin/success');
    }

    public function destroy($id){
        $seat = DB::table('seat')->where('auditorium_id', $id)->delete();
        $reserve = Auditorium::findOrfail($id);
        $reserve->delete();
        return redirect('/admin/success');
    }

}
