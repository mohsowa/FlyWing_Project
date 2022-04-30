<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luggage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'quantity',
        'total_weight',
        'total_price',
        'created_at',
        'updated_at'
    ];
}
