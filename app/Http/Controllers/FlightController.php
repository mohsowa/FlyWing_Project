<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use function GuzzleHttp\Promise\all;
use DateTime;

class FlightController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if((DB::table('admins')->where('user_id', Auth::user()->id)->exists())){
            return view('admin.pages.flights');
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Flight::create([
            'status' => 'new',
            'plane_id'  =>$request['plane_id'],
            'date' => $request['date'],
            'origin' => $request['origin'],
            'destination' => $request['destination'],
            'departure_time' => $request['departure_time'],
            'arrival_time' => $request['arrival_time'],
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {

        if((DB::table('admins')->where('user_id', Auth::user()->id)->exists())){
            $is_updated = false;
            return view('admin.pages.flight.flight_info')->with(compact('flight','is_updated'));
        }else{
            return view('layouts.permission_view');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        Flight::where('id',$flight->id)->update([
            'status' => $request['status'],
            'plane_id'  =>$request['plane_id']?: $flight->plane_id ,
            'date' => $request['date'],
            'origin' => $request['origin']? : $flight->origin,
            'destination' => $request['destination']? : $flight->destination,
            'departure_time' => $request['departure_time'],
            'arrival_time' => $request['arrival_time'],
            'updated_at' => new DateTime('now')
        ]);
        $flight = Flight::where('id',$flight->id)->first();
        $is_updated = true;
        return view('admin.pages.flight.flight_info')->with(compact('flight','is_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
