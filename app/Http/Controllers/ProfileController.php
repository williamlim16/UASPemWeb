<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userid = Auth::user()->id;
        $data = DB::table('users')->where('id', $userid)->first();
        return view('profile.index', ['data' => $data]);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $in = $request->all();
        $user->update($in);
        $user->save();
        return redirect('/home');
    }

    public function editPict($id){
        $user = User::find($id);
        if($user->profilepath == NULL){
            $user->profilepath = 'img/default_profile.png';
        }
        return view('profile.editPict',['user'=>$user]);
    }
    public function updatePict(Request $request, $id){
        $user = User::find($id);
        $file = $request->file('profile');
        $filename = $user->name.".".$file->getClientOriginalExtension();
        $target = 'profile/img';
        $file->move($target,$filename);
        $user->profilepath = $target.'/'.$filename;
        $user->save();
        return redirect('/home');
    }
}
