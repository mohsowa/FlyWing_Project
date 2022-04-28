<div class="container py-5">

    {{-- Title --}}
    <div class="text-center py-4">
        <h3><i class="fa-solid fa-layer-group"></i> {{__('Recent Flights')}}</h3>
    </div>

    {{-- Card Sectiom --}}
    <div class="card-deck card-columns p-2 row justify-content-center">
        @foreach(\App\Models\Flight::all() as $flight)
            <div class="card card-ticket col-sm-12 text-center m-2">
                <div class="py-2 row">
                    <div class="col-sm-12 col-md-12 col-lg-8 row justify-content-center align-self-center">

                        @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                            @if($flight->origin == $airport->code)
                                <div class="col-sm-12 col-md-5  row">
                                    <h4 class="col-4 text-primary-p "><strong>{{$flight->origin}}</strong></h4>
                                    <div class="col text-start">
                                        <div>{{$airport->name}}</div>
                                        <div>{{$airport->country}}</div>
                                        <div class="text-black-50"><i class="fa-solid fa-clock"></i> {{$flight->departure_time}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <div class="col-sm-12 col-md-2 mb-3 align-self-center">

                            <i class="fa-solid fa-plane-departure text-blue m-1"></i>
                            <div>{{$flight->date}}</div>
                            <div>{{\App\Http\Controllers\AirportsController::time_diff($flight->departure_time,$flight->arrival_time)}}</div>

                        </div>

                        @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                            @if($flight->destination == $airport->code)
                                <div class="col-sm-12 col-md-5 row">
                                    <h4 class="col-4 text-primary-p"><strong>{{$flight->destination}}</strong></h4>
                                    <div class="col text-start">
                                        <div>{{$airport->name}}</div>
                                        <div>{{$airport->country}}</div>
                                        <div class="text-black-50"><i class="fa-solid fa-clock"></i> {{$flight->arrival_time}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 row py-3 m-1 bg-main p-1 rounded">
                        <div class="col">
                            <div> {{__('Economy')}} </div>
                            <a class="col btn btn-sm btn-blue text-white m-1" href="#">{{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_econ_class}} SAR</a>
                        </div>
                        <div class="col">
                            <div> {{__('Business')}} </div>
                            <a class="col btn btn-sm btn-outline-light m-1" href="#"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_bus_class}} SAR</a>
                        </div>
                        <div class="col">
                            <div> {{__('FirstClass')}} </div>
                            <a class="col btn btn-sm btn-outline-light m-1" href="#"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_first_class}} SAR</a>
                        </div>


                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
