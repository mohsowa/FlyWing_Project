<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;


class PassengerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.passengers');
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
            "user_id" => $request->get('user_id')
        ]);
        return redirect()->to('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        //
    }
}
