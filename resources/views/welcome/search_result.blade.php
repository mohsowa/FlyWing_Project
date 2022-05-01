@extends('home')
@section('page_title')
    @yield('sub_page_name',__('Profile'))
@endsection

@section('main-content')
    <div class="container py-3">

        {{-- Head Section--}}
        <div class="row py-4">
            <div class="col-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('Search for Flight')}}</h1>
                </div>
            </div>
            <div class="col-6">
                <img src="{{asset('/src/images/search.png')}}" style="width: 30vw;" class="img-fluid">
            </div>
        </div>

        @if($direct_list->count() != 0)
        <div class="container py-5">

            {{-- Title --}}
            <div class="text-center py-4">
                <h3><i class="fa-solid fa-plane-departure"></i> {{__('Direct Flight')}}</h3>
            </div>

            {{-- Card Sectiom --}}
            <div class="card-deck card-columns p-2 row justify-content-center">
                @foreach($direct_list as $flight)
                    @if($flight->status == 'booking')
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
                                {{-- Price Section --}}
                                <div class="col-sm-12 col-md-12 col-lg-4 row py-3 m-1 bg-main p-1 rounded">
                                    <div class="col">
                                        <div> {{__('Economy')}} </div>
                                        <form method="post" action="{{route('booking')}}">
                                            @csrf
                                            @method('POST')
                                            <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                            <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                            <input type="text" name="type" value="economy" hidden>
                                            <button class="col btn btn-sm btn-blue text-white m-1" type="submit">{{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_econ_class * $passengers}} SAR</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <div> {{__('Business')}} </div>
                                        <form method="post" action="{{route('booking')}}">
                                            @csrf
                                            @method('POST')
                                            <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                            <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                            <input type="text" name="type" value="business" hidden>
                                            <button class="col btn btn-sm btn-outline-light m-1" type="submit"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_bus_class * $passengers}} SAR</button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <div> {{__('FirstClass')}} </div>
                                        <form method="post" action="{{route('booking')}}">
                                            @csrf
                                            @method('POST')
                                            <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                            <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                            <input type="text" name="type" value="firstClass" hidden>
                                            <button class="col btn btn-sm btn-outline-light m-1" type="submit"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_first_class * $passengers}} SAR</button>
                                        </form>
                                    </div>


                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

            {{--Round trip--}}
            @if($round_list->count() != 0)
                <hr>
                <div class="container py-5">

                    {{-- Title --}}
                    <div class="text-center py-4">
                        <h3><i class="fa-solid fa-plane-arrival"></i> {{__('Round Trip')}}</h3>
                    </div>

                    {{-- Card Sectiom --}}
                    <div class="card-deck card-columns p-2 row justify-content-center">
                        @foreach($round_list as $flight)
                            @if($flight->status == 'booking')
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
                                        {{-- Price Section --}}
                                        <div class="col-sm-12 col-md-12 col-lg-4 row py-3 m-1 bg-main p-1 rounded">
                                            <div class="col">
                                                <div> {{__('Economy')}} </div>
                                                <form method="post" action="{{route('booking')}}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                                    <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                                    <input type="text" name="type" value="economy" hidden>
                                                    <button class="col btn btn-sm btn-blue text-white m-1" type="submit">{{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_econ_class * $passengers}} SAR</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <div> {{__('Business')}} </div>
                                                <form method="post" action="{{route('booking')}}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                                    <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                                    <input type="text" name="type" value="business" hidden>
                                                    <button class="col btn btn-sm btn-outline-light m-1" type="submit"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_bus_class * $passengers}} SAR</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <div> {{__('FirstClass')}} </div>
                                                <form method="post" action="{{route('booking')}}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="number" value="{{$passengers}}" name="passengers" hidden>
                                                    <input type="text" name="flight_id" value="{{$flight->id}}" hidden>
                                                    <input type="text" name="type" value="firstClass" hidden>
                                                    <button class="col btn btn-sm btn-outline-light m-1" type="submit"> {{\App\Models\Aircraft::where('plane_id' ,$flight->plane_id )->first()->price_first_class * $passengers}} SAR</button>
                                                </form>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @endif
        @else
            <div class="container text-center py-5">
                <h3>{{__('Sorry, No flight data to display')}}</h3>
            </div>
        @endif

    </div>

@endsection
