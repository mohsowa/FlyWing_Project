<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Flight;
use App\Models\Luggage;
use App\Models\Ticket;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
        $is_admin = \App\Models\Admin::where('user_id',$user->id)->exists();

        if($is_passenger){
            return view('passenger.pages.tickets');
        }


        if($is_admin){
            return view('admin.pages.tickets');
        }

        return view('admin.pages.tickets');
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
    public function store( Request $request){
        $passenger = $request['passenger'];
        $aircraft = Aircraft::where('plane_id',$request['flight_id'])->first();
        $passenger_id = $request['passenger-id'];
        for($i=0; $i < $passenger; $i++){


            $ticket = \App\Models\Ticket::create([
                'passenger_id' => $passenger_id,
                'flight_id'=> $request['flight_id'],
                'Fname' =>$request["FirstName-{$i}"],
                'Lname' =>$request["LastName-{$i}"],
                'status' => $request["status"],
                'date_of_birth' => $request["dob-{$i}"],
                'sex' => $request["sex-{$i}"],
                'phone' =>$request["PhoneNumber-{$i}"],
                'gov_id' => $request["nationalID-{$i}"],
                'passport_no' => $request["passport-{$i}"],
                'class_type' => $request["class"],
                'incl_food' => $request["food-{$i}"] == 'on' ?1:0,
                'incl_wifi' => $request["wifi-{$i}"]== 'on' ?1:0,
                'incl_phone_calls' =>$request["calls-{$i}"]== 'on' ?1:0,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);



            \App\Models\Luggage::create([
                'ticket_id' => $ticket->id,
                'quantity' => $request["quantity-{$i}"],
                'total_weight' =>$request["total_weight-{$i}"],
                'total_price' => $request["quantity-{$i}"] * $request["quantity-{$i}"] * $aircraft->price_luggage,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);

        }
        return redirect()->to('complete-payment');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        Ticket::where('id',$ticket->id)->delete();
        return redirect()->back();
    }

}
