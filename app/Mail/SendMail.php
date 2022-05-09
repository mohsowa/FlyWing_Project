<?php

namespace App\Mail;

use App\Models\Flight;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $passenger = $this->data['passenger'];
        $payment = $this->data['payment'];
        $ticket = $this->data['ticket'];
        $flight = Flight::where('id' , $ticket->flight_id)->first();


        return $this->from('info@flywing.online')->subject(__("Ticket Detail"))->view('send_email')->with(compact('payment','passenger','ticket','flight'));
    }
}
