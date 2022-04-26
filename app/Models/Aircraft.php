<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'plane_id',
        'num_first_class',
        'price_first_class',
        'num_bus_class',
        'price_bus_class',
        'num_econ_class',
        'price_econ_class',
        'created_at',
        'updated_at'
    ];

    public function plane()
    {
        return $this->belongsTo(Plane::class,'plane_id');
    }
}
