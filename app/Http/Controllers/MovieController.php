<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('admin-access')) { //not authorized as admin, declared in AuthServiceProvider.php
                abort(403, 'Unauthorized action.');
            } else {
                return $next($request);
            }
        });
    }

    public function index(Request $request)
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
                    $btn = '<a href="/admin/movies/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . '<form action="/admin/movies/' . $row->id . '"method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Delete" class="btn btn-danger">
                    </form>';
                    return $btn;
                })
                ->addColumn('thumbnail', function ($row) {
                    $img = '<img src=/' . $row->posterpath . ' style="width:50px;height:50px">';
                    return $img;
                })
                ->rawColumns(['thumbnail', 'action'])
                ->make(true);
        }
        return view('admin.movie.index');
    }


    public function show($id)
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

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $in = $request->all();
        $in['categories'] = explode(',', $in['categories']);
        $in['casts'] = explode(',', $in['casts']);
        $movie->update($in);
        $movie->save();
        return redirect('/admin/success');
    }

    public function create()
    {
        return view('admin.movie.create');
    }

    public function store(Request $request)
    {
        $movie = new Movie();
        $in = $request->only(['title', 'director', 'synopsis', 'time', 'age', 'categories', 'casts', 'posterpath']);
        $file = $request->file('poster');
        $filename = $in['title'] . "." . $file->getClientOriginalExtension();
        $filename = str_replace(' ', '', $filename);
        $target = 'movie/img';
        $file->move($target, $filename);
        $in['posterpath'] = 'movie/img/' . $filename;
        $in['categories'] = '["' . str_replace(',', '","', str_replace(', ', ',', $in['categories'])) . '"]';
        $in['casts'] = '["' . str_replace(',', '","', str_replace(', ', ',', $in['casts'])) . '"]';
        $movie->insert($in);
        // $movie->save();
        return redirect('/admin/success');
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
        return redirect('/admin/success');
    }

    public function posterEdit($id)
    {
        $movie = Movie::find($id);
        return view('admin.movie.poster', ['movie' => $movie]);
    }

    public function posterStore(Request $request, $id)
    {
        $movie = Movie::find($id);
        $file = $request->file('poster');
        $filename = $movie['title'] . "." . $file->getClientOriginalExtension();
        $target = 'movie/img';
        $file->move($target, $filename);
        DB::table('movie')->where('id', $id)->update(['posterpath' => "movie/img/" . $filename]);
        return redirect('/admin/success');
    }
}
