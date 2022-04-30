<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
    'operation_id',
    'bank',
    'company_name',
    'card_type',
    'status',
    'date',
    'amount',
    'created_at',
    'updated_at'
    ];
}
