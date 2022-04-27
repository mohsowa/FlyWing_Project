@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Plane')}}
@endsection

{{-- Nav Status --}}
@section('plane-active')
    btn-primary-outline-active disabled
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container py-3">
        {{-- Image Section--}}
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1 class="display-3">{{__('Plane Info')}}</h1>
                    <form method="POST" action="{{route('plane.destroy',$plane)}}" onsubmit="return confirm('{{__('Are you sure you want to delete this plane? ')}}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn col-4 btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i> {{__('Delete')}}</button>
                    </form>

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img src="{{asset('/src/images/plane/plane.png')}}" style="width: 70vw;" class="img-fluid">
            </div>
        </div>

        <hr>

        {{-- Message section--}}
        @if( $is_updated == true)
        <div class="alert-success text-center rounded-2 p-3">
            <div>{{__('Updated Successfully')}}</div>
        </div>
        @endif

        {{-- Form Section--}}
        <div class="container py-4">
            <form method="POST" action="{{ route('plane.update',$plane)}}" autocomplete="off" onsubmit="return chickAirport(this)">
                @csrf
                @method('PATCH')



                <div class="row p-2">
                    {{--L Side--}}
                    <div class="col-sm-12 col-md-6 mb-3">

                        {{--Form Title--}}
                        <div class="text-center">
                            <h5 class="h5">{{__('Plane Info')}}</h5>
                        </div>


                        {{--Form Input--}}

                        {{-- Plane ID--}}
                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Plane ID')}}
                        </div>
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-fingerprint"></i></div>
                            <input class="col text-black-50 form-control" type="text" name="LastMaintenance" value="{{$plane->id}}" placeholder="{{__('Plane ID')}}" disabled required>
                        </div>




                        {{--status input--}}
                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>
                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Status')}}
                        </div>

                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-check"></i></div>
                            <select class="col text-black-50 form-control" name="status" placeholder="{{__('Status')}}">
                                <option value="active" @if($plane->status == 'active') selected @endif>{{__('Active')}}</option>
                                <option value="inactive" @if($plane->status == 'inactive') selected @endif>{{__('Inactive')}}</option>
                                <option value="u_maintenance" @if($plane->status == 'u_maintenance') selected @endif>{{__('Under Maintenance')}}</option>
                            </select>
                        </div>


                        {{--Type input--}}

                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Aircraft Type')}}
                        </div>


                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-plane-up"></i></div>
                            <select class="col text-black-50  form-control" name="type" placeholder="{{__('type')}}" required>
                                <option value="Boeing 747" @if($plane->aircraft_type == 'Boeing 747') selected @endif>{{__('Boeing 747')}}</option>
                                <option value="Boeing 777" @if($plane->aircraft_type == 'Boeing 777') selected @endif>{{__('Boeing 777')}}</option>
                                <option value="Boeing 787" @if($plane->aircraft_type == 'Boeing 747') selected @endif>{{__('Boeing 787')}}</option>
                                <option value="Airbus A320" @if($plane->aircraft_type == 'Boeing 787') selected @endif>{{__('Airbus A320')}}</option>
                                <option value="Airbus A330" @if($plane->aircraft_type == 'Airbus A330') selected @endif>{{__('Airbus A330')}}</option>
                                <option value="Bombardier CRJ" @if($plane->aircraft_type == 'Bombardier CRJ') selected @endif>{{__('Bombardier CRJ')}}</option>
                                <option value="Cessna 172" @if($plane->aircraft_type == 'Cessna 172') selected @endif>{{__('Cessna 172')}}</option>
                            </select>
                        </div>

                        {{--First flight input--}}

                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('First Flight Date')}}
                        </div>

                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-calendar"></i></div>
                            <input class="col text-black-50 form-control" type="date" value="{{$plane->first_flight_date}}" id="fistFlightD" name="fistFlightD" value="{{old('fistFlightD')}}" placeholder="{{__('First Flight Date')}}" required>
                        </div>


                        {{--Last maintance input--}}
                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Last maintenance input')}}
                        </div>

                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            <input class="col text-black-50 form-control" type="date" name="LastMaintenance" value="{{$plane->last_maintenance_date}}" placeholder="{{__('Last Maintenance')}}" disabled required>
                        </div>


                        {{--Next maintance input --}}

                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-danger text-center mb-3 m-1">
                            {{__('Note | Next maintenance date should be on:  ')}} {{$plane->next_maintenance_date}}
                            <div class="text-black-50">
                                {{__('Set a new Date:')}}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-arrow-right-long"></i><i class="fa-solid fa-screwdriver-wrench"></i></div>
                            <input class="col text-black-50 form-control" type="date" name="NextMaintenance" value="{{old('Next Maintenance')}}" placeholder="{{__('Next Maintenance')}}" required>
                        </div>




                    </div>

                    {{--R Side--}}
                    <div class="col-sm-12 col-md-6 mb-3">

                        {{--Form Title--}}
                        <div class="text-center">
                            <h5 class="h5">{{__('Aircraft Info')}}</h5>
                        </div>


                        {{--Form Input--}}

                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('First Class')}}
                        </div>
                        {{--First class seats input --}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->num_first_class}}" type="text" name="fistSeat" value="{{old('fistSeat')}}" placeholder="{{__('First Class Seates Number')}}" required>
                        </div>


                        {{--First class price--}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->price_first_class}}" type="text" name="fistPrice" value="{{old('firstPrice')}}" placeholder="{{__('First Class Price')}}" required>
                        </div>

                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Business Class')}}
                        </div>

                        {{--Business class seats--}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->num_bus_class}}" type="text" name="BusinessSeats" value="{{old('BusinessSeats')}}" placeholder="{{__('Business Class Seates Number')}}" required>
                        </div>
                        {{--Business class price--}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->price_bus_class}}" type="text" name="BusinessPrice" value="{{old('BusinessPrice')}}" placeholder="{{__('Business Class Price')}}" required>
                        </div>

                        <div class="text-center">
                            <hr style="margin: auto;">
                        </div>


                        <div class="text-black-50 text-center mb-3 m-1">
                            {{__('Economy Class')}}
                        </div>

                        {{--Economy class seats--}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->num_econ_class}}" type="text" name="EcoSeats" value="{{old('EcoSeats')}}" placeholder="{{__('Economy Class Seates Number')}}" required>
                        </div>
                        {{--Economy class Price--}}
                        <div class="row mb-3">
                            <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                            <input class="col form-control-dark text-black-50 form-control" value="{{$aircraft->price_econ_class}}" type="text" name="EcoSeatsPrice" value="{{old('EcoPrice')}}" placeholder="{{__('Economy Class Price')}}" required>
                        </div>
                    </div>




                </div>


                <div class="">
                    <button class="btn btn-blue btn-block"  type="submit"><i class="fa-solid fa-pen"></i> {{__('Update')}}</button>
                </div>

            </form>
        </div>

    </div>

@endsection
