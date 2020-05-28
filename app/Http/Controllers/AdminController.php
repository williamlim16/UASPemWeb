<?php

namespace App\Http\Controllers;
use Response;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


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
}
