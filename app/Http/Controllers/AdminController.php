<?php

namespace App\Http\Controllers;

use Response;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Movie;
use Yajra\DataTables\DataTables;


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
            if (!Gate::allows('admin-access')) { //not authorized as admin, declared in AuthServiceProvider.php
                abort(403, 'Unauthorized action.');
            } else {
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
    public function movie(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('movie')->get();
            for ($i = 0; $i < count($data); $i++) {
                $data[$i]->categories = str_replace(array('[', ']', '"'), ' ', $data[$i]->categories);
                $data[$i]->casts = str_replace(array('[', ']', '"'), ' ', $data[$i]->casts);
            }
            // $this->info($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="movie/edit/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . ' <a href="movie/delete/' . $row->id . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                    return $btn;
                })
                ->addColumn('moviepath', function ($row) {
                    $img = '<img src =' . $row->posterpath . '>';
                    return $img;
                })
                ->rawColumns(['action', 'moviepath'])
                ->make(true);
        }
        return view('admin.movie.index');
    }


    public function movieCreate(Request $request)
    {
        return view('admin.movie.create');
    }

    public function movieDetail($movieId)
    {
        $data = Movie::find($movieId);
        return view('admin.movie.detail', ['movie' => $data]);
    }

    public function movieInsert(Request $request)
    {
        $movie = new Movie();
        $in = $request->only(['title', 'director', 'synopsis', 'time', 'age', 'categories', 'casts']);
        $file = $request->file('poster');
        $target = 'img';
        $file->move($target, $in['title'] . "." . $file->getClientOriginalExtension());
        $in['posterpath'] = 'img/' . $in['title'] . "." . $file->getClientOriginalExtension();
        $in['categories'] = '["' . str_replace(',', '","', str_replace(', ', ',', $in['categories'])) . '"]';
        $in['casts'] = '["' . str_replace(',', '","', str_replace(', ', ',', $in['casts'])) . '"]';
        $movie->insert($in);
        // $movie->save();
        return redirect('/admin/movie/success');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        $casts = '';
        foreach ($movie->casts as $index => $actor) {
            if ($index == 0) {
                $casts = $actor;
            } else $casts = $casts . ',' . $actor;
        }
        $categories = '';
        foreach ($movie->categories as $index => $genre) {
            if ($index == 0) {
                $categories = $genre;
            } else $categories = $categories . ',' . $genre;
        }
        $movie->categories = $categories;
        $movie->casts = $casts;
        return view('admin.movie.edit', ['movie' => $movie]);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrfail($id);
        $movie->delete();
        return redirect('/admin/movie/');
    }

    public function movieSuccess()
    {
        return view('admin.movie.success');
    }

    //=========================[[[SCREENING AND TICKETING]]]=========================
    public function screening()
    {


    }


    //=========================[[[AUDITORIUM, ETC]]]=========================
    public function facility()
    {

    }


    //=========================[[[STATISTIC]]]=========================
    public function statistics()
    {

    }
}
