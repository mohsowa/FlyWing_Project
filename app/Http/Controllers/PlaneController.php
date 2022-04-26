<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlaneController extends Controller
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
        // will chick if the user is admin. otherwise, it will rout access denied page.
        if((DB::table('admins')->where('user_id', Auth::user()->id)->exists())){
            return view('admin.pages.planes');
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

        $plane = Plane::create([
            "status" => $request['status'],
            "aircraft_type" => $request['type'],
            "first_flight_date" => $request['fistFlightD'],
            "next_maintenance_date" => $request['NextMaintenance'],
            "last_maintenance_date" => $request['LastMaintenance'],
            "created_at" => new DateTime('now'),
            "updated_at" => new DateTime('now')
        ]);

        // create Aircraft object

        Aircraft::create([
            'plane_id' => $plane->id,
            'num_first_class' => $request['fistSeat'],
            'price_first_class' => $request['fistPrice'],
            'num_bus_class' => $request['BusinessSeats'],
            'price_bus_class' => $request['BusinessPrice'],
            'num_econ_class' => $request['EcoSeats'],
            'price_econ_class' => $request['EcoSeatsPrice'],
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);

        return redirect()->to('/plane');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function show(Plane $plane)
    {
        $aircraft = Aircraft::where('plane_id' , $plane->id)->first();
        $is_updated = false;

        if((DB::table('admins')->where('user_id', Auth::user()->id)->exists())){
            return view('admin.pages.plane.plane_info')->with(compact('plane','aircraft','is_updated'));
        }else{
            return view('layouts.permission_view');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function edit(Plane $plane)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plane $plane)
    {

        $aircraft = Aircraft::where('plane_id' , $plane->id)->first();

        Plane::where('id',$plane->id)->update([
            "status" => $request['status'],
            "aircraft_type" => $request['type'],
            "first_flight_date" => $request['fistFlightD'],
            "next_maintenance_date" => $request['NextMaintenance'],
            "last_maintenance_date" => $plane->next_maintenance_date,
            "updated_at" => new DateTime('now')
        ]);

        // create Aircraft object

        Aircraft::where('id',$aircraft->id)->update([
            'plane_id' => $plane->id,
            'num_first_class' => $request['fistSeat'],
            'price_first_class' => $request['fistPrice'],
            'num_bus_class' => $request['BusinessSeats'],
            'price_bus_class' => $request['BusinessPrice'],
            'num_econ_class' => $request['EcoSeats'],
            'price_econ_class' => $request['EcoSeatsPrice'],
            'updated_at' => new DateTime('now')
        ]);
        $is_updated = true;

        return view('admin.pages.plane.plane_info')->with(compact('plane','aircraft','is_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plane $plane)
    {
        //
    }
}
