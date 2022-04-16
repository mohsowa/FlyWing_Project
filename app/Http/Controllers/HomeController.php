<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(DB::table('admins')->where('user_id', Auth::user()->id)->exists()){
            return view('admin.home');
        }

        if(DB::table('passengers')->where('user_id', Auth::user()->id)->exists()){
            return view('passenger.home');
        }


        return view('layouts.review');
    }
}
