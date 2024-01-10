<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Mail;
use Auth;

class SendEmailController extends Controller
{
    function index()
    {
        return view('send_email');
    }

    function send($data)
    {
        $email = Auth::user()->email;
        //Mail::to("$email")->send(new SendMail($data));


    }
}

