@php use App\Http\Controllers\AirportsController; @endphp
@php use App\Models\Plane; @endphp
@php use App\Models\Ticket; @endphp
@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Flight Info')}}
@endsection

{{-- Nav Status --}}
@section('flight-active')
    btn-primary-outline-active disabled
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container py-3">
        {{-- Image Section--}}
        <div class="text-center py-5">
            <img src="{{asset('/src/images/world.png')}}" style="width: 30rem;" class="img-fluid">
            <div class="text-center py-5">
                <h1>{{__('Flight Info')}}</h1>

                <form method="POST" action="{{route('flight.destroy',$flight)}}"
                      onsubmit="return confirm('{{__('Are you sure you want to delete this flight? ')}}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn col-4 btn-outline-danger btn-sm"><i
                                class="fa-solid fa-trash-can"></i> {{__('Delete')}}</button>
                </form>

            </div>
        </div>

        <hr>

        {{-- Message section--}}
        @if( $is_updated == true)
            <div class="alert-success text-center rounded-2 p-3 py-2">
                <div>{{__('Updated Successfully')}}</div>
            </div>
        @endif

        <div class="container bg-main">
            <div class="container py-4 p-4">
                <form method="POST" action="{{ route('flight.update',$flight)}}" autocomplete="off"
                      onsubmit="return chickFlight(this)">
                    @csrf
                    @method('PATCH')

                    <div class="row text-center">

                        {{-- ID --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center disabled-3"><i class="fa-solid fa-fingerprint"></i>
                            </div>
                            <input type="text" name="id" value="{{$flight->id}}" class="form-control col"
                                   style="background-color: rgba(255,255,255,0.3); pointer-events: none;" required>
                        </div>

                        {{-- Plane --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-check-double"></i></div>
                            <select name="status" class="col form-control js-example-basic-multiple" required>
                                <option value="new" @if($flight->status == 'new') selected
                                        @endif @if($flight->status == 'booking' ||  $flight->status == 'closed')disabled @endif>{{__('New')}}</option>
                                <option value="booking"
                                        @if($flight->status == 'booking') selected @endif>{{__('Booking')}}</option>
                                <option value="closed"
                                        @if($flight->status == 'closed') selected @endif>{{__('Closed')}}</option>
                            </select>
                        </div>

                    </div>


                    <div class="row text-center">
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i></div>
                            <select class="js-example-basic-multiple col form-control" disabled required>
                                @foreach(AirportsController::getAirportsInfo() as $airport)
                                    @if($flight->origin == $airport->code)
                                        <option value="{{$airport->code}}" selected> {{$airport->code}}
                                            , {{$airport->name}}
                                            , {{$airport->country}}</option>
                                    @else
                                        <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                            , {{$airport->country}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-plane-arrival"></i>
                            </div>
                            <select class="js-example-basic-multiple col form-control" disabled required>
                                @foreach(AirportsController::getAirportsInfo() as $airport)
                                    @if($flight->destination == $airport->code)
                                        <option value="{{$airport->code}}" selected> {{$airport->code}}
                                            , {{$airport->name}}
                                            , {{$airport->country}}</option>
                                    @else
                                        <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                            , {{$airport->country}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row text-center">

                        {{-- Date --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-calendar-days"></i></div>
                            <input type="date" name="date" value="{{$flight->date}}" class="form-control col" required>
                        </div>

                        {{-- Plane --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane"></i></div>
                            <select name="plane_id" class="col form-control js-example-basic-multiple" disabled
                                    required>
                                @foreach(Plane::all() as $plane)
                                    @if($plane->status == 'active')
                                        @if($flight->plane_id == $plane->id)
                                            <option value="{{$plane->id}}" selected>{{$plane->id}}
                                                , {{$plane->aircraft_type}}</option>
                                        @else
                                            <option value="{{$plane->id}}">{{$plane->id}}
                                                , {{$plane->aircraft_type}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row text-center">

                        {{-- departure_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i><i
                                        class="fa-solid fa-clock"></i></div>
                            <input type="time" name="departure_time" value="{{$flight->departure_time}}"
                                   class="form-control col" required>
                        </div>

                        {{-- arrival_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-arrival"></i><i
                                        class="fa-solid fa-clock"></i></div>
                            <input type="time" name="arrival_time" value="{{$flight->arrival_time}}"
                                   class="form-control col" required>
                        </div>

                    </div>


                    <div class="">
                        <button class="btn btn-blue btn-block" type="submit"><i
                                    class="fa-solid fa-pen"></i> {{__('Update')}}</button>
                    </div>


                </form>

            </div>
        </div>

        <hr>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="bg-main rounded">


                    <tr>

                        <th scope="col">{{__('Total Seats')}}</th>
                        <th scope="col">{{__('Booked Seats')}}</th>
                        <th scope="col">{{__('Available Seats')}}</th>
                        <th scope="col">{{__('Wait-list Seats')}}</th>
                        <th scope="col">{{__('Not-Confirmed Seats')}}</th>
                        <th scope="col">{{__('Canceled Seats')}}</th>
                        <th scope="col">{{__('AVG Booking')}}</th>


                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td>{{$total = ($aircraft->num_bus_class + $aircraft->num_econ_class + $aircraft->num_first_class)}}</td>

                        {{-- select count(*) from Ticket where flight_id = $flight->id and status = 'booked' ; --}}
                        <td>{{$total_booked = Ticket::where('flight_id',$flight->id)->where('status','booked')->get()->count()}}</td>

                        <td>{{$total_av = $total - $total_booked}}</td>

                        {{-- select count(*) from Ticket where flight_id = $flight->id and status = 'wait-list' ; --}}
                        <td>{{$total_wl = Ticket::where('flight_id',$flight->id)->where('status','wait-list')->get()->count()}}</td>

                        {{-- select count(*) from Ticket where flight_id = $flight->id and status = 'deleted' ; --}}
                        <td>{{$total_temp = Ticket::where('flight_id',$flight->id)->where('status','temp')->get()->count()}}</td>

                        {{-- select count(*) from Ticket where flight_id = $flight->id and status = 'deleted' ; --}}
                        <td>{{$total_cl = Ticket::where('flight_id',$flight->id)->where('status','deleted')->get()->count()}}</td>


                        <td>{{$avg_booking = $total_booked/$total *100 }} %</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="text-center py-4">
                <h3><i class="fa-solid fa-ticket-simple"></i>
                    {{__('The flight tickets')}}</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead class="bg-main rounded">


                    <tr>

                        <th scope="col">{{__('Ticket ID')}}</th>
                        <th scope="col">{{__('Passenger ID')}}</th>
                        <th scope="col">{{__('FirstName')}}</th>
                        <th scope="col">{{__('LastName')}}</th>
                        <th scope="col">{{__('Status')}}</th>
                        <th scope="col">{{__('Class Type')}}</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach(Ticket::where('flight_id',$flight->id)->get() as $ticket)

                        <th scope="row">{{$ticket->id}}</th>
                        <td>{{$ticket->passenger_id}}</td>
                        <td>{{$ticket->Fname}}</td>
                        <td>{{$ticket->Lname}}</td>
                        <td>{{$ticket->status}}</td>
                        <td>{{$ticket->class_type}}</td>

                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>

@endsection
