<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */

    protected $fillable = [
        'id',
        'plane_id',
        'status',
        'aircraft_type',
        'first_flight_date',
        'next_maintenance_date',
        'last_maintenance_date',
        'created_at',
        'updated_at'
    ];

    public function aircraft()
    {
        return $this->hasOne(Aircraft::class);
    }
}
