<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketForPayment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'payment_id',
        'ticket_id'
    ];
}
