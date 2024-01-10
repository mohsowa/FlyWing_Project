<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $is_admin = DB::table('admins')->where('user_id', $user->id)->exists();
        $is_passenger = DB::table('passengers')->where('user_id', $user->id)->exists();
        if($is_admin === true){
            $this->middleware('auth');
            return view('admin.home');
        }

        if($is_passenger === true){
            $this->middleware('auth');
            return view('passenger.pages.dashboard');
        }


        return view('layouts.review');
    }
}
