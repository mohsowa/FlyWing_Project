<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AirportsController extends Controller
{
    public static function getAirportsInfo(){
        $path = storage_path().'/app/public/json/airports.json';
        return json_decode(file_get_contents($path));
    }

    public static function time_diff($dep,$arrive){

        $start = Carbon::parse($dep);
        $end = Carbon::parse($arrive);
        $time_spent = $end->diff($start)->format('%H hr %i min');

        return  $time_spent;
    }
}
