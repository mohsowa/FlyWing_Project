<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\TicketForPayment;
use Auth;
use Illuminate\Http\Request;
use DateTime;


class PaymentController extends Controller
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
        $user = Auth::user();
        $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();
        $is_admin = \App\Models\Admin::where('user_id',$user->id)->exists();

        if($is_passenger){
            return view('passenger.pages.payments');
        }


        if($is_admin){
            return view('admin.pages.payments');
        }

        return view('layouts.permission_view');

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



    /**
     * @throws \Exception
     */
    public function store(Request $request)
    {

        // info from $request
        $name = $request['name'];
        $expire = $request['expire'];
        $ccv = $request['ccv'];
        $card_n_1 = $request['card_n_1'];
        $card_n_2 = $request['card_n_2'];
        $card_n_3 = $request['card_n_3'];
        $card_n_4 = $request['card_n_4'];
        $card_number = "$card_n_1 $card_n_2 $card_n_3 $card_n_4";

        //// This is temp code ////
        $payment = Payment::create([
            'operation_id' => random_int(100000,999999),
            'bank' => 'Flywing Bank',
            'company_name' => 'payment_api_provider',
            'card_type' => 'visa',
            'status' =>'accept',
            'date' => new DateTime('now'),
            'amount' => $request['amount'],
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);



        if($payment->status == 'accept'){

            $user = Auth::user();
            $is_passenger = \App\Models\Passenger::where('user_id',$user->id)->exists();

            if($is_passenger){
                $passenger = \App\Models\Passenger::where('user_id',$user->id)->first();

                foreach (\App\Models\Ticket::where('passenger_id', $passenger->id)->where('status' , 'temp')->get() as $ticket){

                    TicketForPayment::create([
                        'payment_id' => $payment->id,
                        'ticket_id' => $ticket->id
                    ]);

                }

                $tickets = Ticket::where('passenger_id', $passenger->id)->where('status' , 'temp')->get();

                foreach($tickets as $ticket){
                    $data = ['passenger' => $passenger, 'payment' =>$payment,'ticket' => $ticket];
                    SendEmailController::send($data);
                }


                Ticket::where('passenger_id', $passenger->id)->where('status' , 'temp')->update([
                    'status' => 'booked'
                ]);


                $message = __('Your payment is accepted.');
                return view('layouts.success_view')->with(compact('message'));

            }

        }else{
            $message = __('Sorry! We face a problem while proscribing yor payment.');
            return view('layouts.error_view')->with(compact('message'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
