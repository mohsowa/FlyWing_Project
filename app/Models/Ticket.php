<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
    'passenger_id',
    'flight_id',
    'Fname',
    'Lname',
    'status',
    'date_of_birth',
    'sex',
    'phone',
    'gov_id',
    'passport_no',
    'class_type',
    'incl_food',
    'incl_wifi',
    'incl_phone_calls',
    'created_at',
    'updated_at'
    ];

}
