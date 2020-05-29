<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditorium;

class AuditoriumController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
      
    }

   
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $in = $request->all();
        $movie->update($in);
        $movie->save();
        return redirect('/admin/screening/success');
    }

    
}
