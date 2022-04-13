<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function getAirportsInfo(){
        $path = storage_path().'/app/public/json/airports.json';
        return json_decode(file_get_contents($path));
    }
}
