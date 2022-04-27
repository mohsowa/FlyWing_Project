<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'plane_id',
        'date',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'created_at',
        'updated_at'
    ];

    public function plane(){
        return $this->hasMany(Plane::class);
    }
}
