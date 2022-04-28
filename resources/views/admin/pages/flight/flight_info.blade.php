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
            <img src="{{asset('/src/images/world.png')}}" style="width: 30rem;"  class="img-fluid">
            <div class="text-center py-5">
                <h1>{{__('Flight Info')}}</h1>

                <form method="POST" action="{{route('flight.destroy',$flight)}}" onsubmit="return confirm('{{__('Are you sure you want to delete this flight? ')}}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn col-4 btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i> {{__('Delete')}}</button>
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
                <form method="POST" action="{{ route('flight.update',$flight)}}" autocomplete="off" onsubmit="return chickFlight(this)">
                    @csrf
                    @method('PATCH')

                    <div class="row text-center">

                        {{-- ID --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center disabled-3"><i class="fa-solid fa-fingerprint"></i></div>
                            <input type="text" name="id" value="{{$flight->id}}" class="form-control col" style="background-color: rgba(255,255,255,0.3); pointer-events: none;"  required>
                        </div>

                        {{-- Plane --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-check-double"></i></div>
                            <select name="status" class="col form-control js-example-basic-multiple" required>
                                <option value="new" @if($flight->status == 'new') selected @endif @if($flight->status == 'booking' ||  $flight->status == 'closed')disabled @endif>{{__('New')}}</option>
                                <option value="booking" @if($flight->status == 'booking') selected @endif>{{__('Booking')}}</option>
                                <option value="closed" @if($flight->status == 'closed') selected @endif>{{__('Closed')}}</option>
                            </select>
                        </div>

                    </div>


                    <div class="row text-center">
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i></div>
                            <select class="js-example-basic-multiple col form-control" name="origin" @if($flight->status == 'booking' ||  $flight->status == 'closed')disabled @endif  required>
                                @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                                    @if($flight->origin == $airport->code)
                                    <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                        , {{$airport->country}}</option>
                                    @else
                                        <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                            , {{$airport->country}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-plane-arrival"></i></div>
                            <select class="js-example-basic-multiple col form-control" name="destination" @if($flight->status == 'booking' ||  $flight->status == 'closed')disabled @endif  required>
                                @if($flight->destination == $airport->code)
                                    <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                        , {{$airport->country}}</option>
                                @else
                                    <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                                        , {{$airport->country}}</option>
                                @endif
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
                            <select name="plane_id" class="col form-control js-example-basic-multiple" disabled required>
                                @foreach(\App\Models\Plane::all() as $plane)
                                    @if($plane->status == 'active')
                                        @if($flight->plane_id == $plane->id)
                                        <option value="{{$plane->id}}" selected>{{$plane->id}}, {{$plane->aircraft_type}}</option>
                                        @else
                                        <option value="{{$plane->id}}">{{$plane->id}}, {{$plane->aircraft_type}}</option>
                                            @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row text-center">

                        {{-- departure_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i><i class="fa-solid fa-clock"></i></div>
                            <input type="time" name="departure_time" value="{{$flight->departure_time}}" class="form-control col" required>
                        </div>

                        {{-- arrival_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-arrival"></i><i class="fa-solid fa-clock"></i></div>
                            <input type="time" name="arrival_time" value="{{$flight->arrival_time}}" class="form-control col" required>
                        </div>

                    </div>


                    <div class="">
                        <button class="btn btn-blue btn-block"  type="submit"><i class="fa-solid fa-pen"></i> {{__('Update')}}</button>
                    </div>


                </form>

            </div>
        </div>

        <hr>



    </div>

@endsection
