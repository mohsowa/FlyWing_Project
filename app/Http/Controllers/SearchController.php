<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function one_way_search(Request $request){

        $origin = $request['origin'];
        $destination = $request['destination'];
        $date_go = $request['date_go'];
        $passengers= $request['passengers'];
        $date_back = $request['date_back'];
        $round_trip = (bool)$date_back;

        $direct_list = Flight::where('origin' , $origin)->where('destination' , $destination)->
            where('date',$date_go )->get();


        $round_list = Flight::where('origin' , $destination)->where('destination' , $origin)->
        where('date',$date_back )->get();


        return view('welcome.search_result')->with(compact(['direct_list','passengers','round_trip','round_list']));
    }

}
