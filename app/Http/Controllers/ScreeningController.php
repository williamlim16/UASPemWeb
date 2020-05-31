<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Screening;

class ScreeningController extends Controller
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
        $screening = Screening::find($id);
        $in = $request->all();
        $screening->update($in);
        $screening->save();
        return redirect('/admin/screening/success');
    }

}
