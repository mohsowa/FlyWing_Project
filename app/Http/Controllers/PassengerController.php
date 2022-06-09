<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Illuminate\Support\Facades\DB;
use Auth;


class PassengerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        if(DB::table('admins')->where('user_id', Auth::user()->id)->exists()) {
            return view('admin.pages.passengers');
        }else{
            return view('layouts.permission_view');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Passenger::create([
            "user_id" => $request->get('user_id'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        $user = User::where('id',$passenger->user_id)->first();
        $passenger = Passenger::where('id',$passenger->id)->first();
        if(DB::table('admins')->where('user_id', Auth::user()->id)->exists()){
            return view('admin.pages.passengers.passenger_profile')->with(compact('user','passenger'));
        }else{
            return view('layouts.permission_view');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
        $this->middleware('auth');
        Passenger::where('id' , $passenger->id)->update([
            'sex' => $request['sex']? : $passenger->sex,
            'date_of_birth' => $request['dob']? : $passenger->date_of_birth
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        $this->middleware('auth');
    }
}
