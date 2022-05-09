@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Booking')}}
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Head Section--}}
        <div class="row py-4">
            <div class="col-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('Booking Ticket')}}</h1>
                </div>
            </div>
            <div class="col-6">
                <img src="{{asset('/src/images/booking.png')}}" style="width: 30vw;" class="img-fluid">
            </div>
        </div>

        {{-- Info Section--}}
        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead class="bg-main rounded">
                <tr>
                    <th scope="col">{{__('Flight ID')}}</th>
                    <th scope="col">{{__('Origin')}}</th>
                    <th scope="col">{{__('Destination')}}</th>
                    <th scope="col">{{__('Class')}}</th>
                    <th scope="col">{{__('Number of Passengers')}}</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <th scope="row">{{$flight->id}}</th>
                    <td>{{$flight->origin}}</td>
                    <td>{{$flight->destination}}</td>
                    <td>{{$type}}</td>
                    <td>{{$passengers}}</td>

                </tr>


                </tbody>
            </table>
        </div>


        {{-- Form Section--}}

        <div class="bg-main rounded-3 py-3">
            <div class="mb-3 container">


                <div class="container p-4">
                    <form method="POST" action="{{route('ticket.store')}}" autocomplete="off">
                        @csrf
                        @method('POST')

                        <input type="text" name="status" value="temp" hidden>
                        <input type="text" name="passenger" value="{{$passengers}}" hidden>
                        <input type="number" name="flight_id" value="{{$flight->id}}" hidden>
                        <input type="text" name="class" value="{{$type}}" hidden>
                        @for($i=0; $i < $passengers; $i++)

                            <div class="text-center py-4">
                                <h4> {{__('Ticket')}} - {{$i+1}}</h4>
                            </div>

                            <input name="status-{{$i}}" value="temp" hidden>

                            <div class="row text-center">

                                {{-- First Name --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-pen"></i></div>
                                    <input type="text" name="FirstName-{{$i}}" value="{{old('FirstName')}}"
                                           placeholder="{{__('First Name')}}" class="form-control col" required>
                                </div>

                                {{-- Last Name --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-pen"></i></div>
                                    <input type="text" name="LastName-{{$i}}" value="{{old('LastName')}}"
                                           placeholder="{{__('Last Name')}}" class="form-control col" required>
                                </div>

                            </div>
                            <div class="row text-center">

                                {{-- National ID --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-id-card"></i></div>
                                    <input type="number" maxlength="10" minlength="10" max="9999999999" name="nationalID-{{$i}}"
                                           value="{{old('nationalID')}}" placeholder="{{__("National ID")}}"
                                           class="form-control col" required>
                                </div>

                                {{-- Passport --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-passport"></i></div>
                                    <input type="text" name="passport-{{$i}}" value="{{old('passport')}}"
                                           placeholder="{{__("Passport Number (optional)")}}" class="form-control col">
                                </div>

                            </div>

                            <div class="row text-center">

                                {{-- Phone Number --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-phone"></i></div>
                                    <input type="number" name="PhoneNumber-{{$i}}" minlength="10" maxlength="10" value="{{old('PhoneNumber')}}"
                                           placeholder="{{__("e.g. 0512345678")}}" class="form-control col" required>
                                </div>
                                {{-- Gender --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-venus-mars"></i></div>
                                    <select name="sex-{{$i}}" class="col form-control js-example-basic-multiple" required>
                                        <option value="select" disabled selected>{{__('Select Sex')}}</option>
                                        <option value="male" >{{__('Male')}}</option>
                                        <option value="female" >{{__('Female')}}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row text-center">

                                {{-- Date of Birth --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-calendar-days"></i>
                                        <div>{{__('Date of Birth')}}</div>
                                    </div>
                                    <input type="date" name="dob-{{$i}}" value="{{old('dob')}}" class="form-control col"
                                           required>
                                </div>
                                <div class="col-lg mb-3 row">
                                    {{--quantity--}}
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-bag-shopping"></i>

                                    </div>
                                    <input type="number" min="0" max="3" placeholder="{{__('Quantity')}}" name="quantity-{{$i}}"  class="form-control col"
                                           required>
                                    {{--Total W--}}
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-weight-scale"></i>

                                    </div>
                                    <input type="number" min="0" max="15" name="total_weight-{{$i}}" placeholder="{{__('Total weight')}}" class="form-control col"
                                           required>
                                </div>
                            </div>


                            <div class="row text-center justify-content-center p-2 py-4">

                                {{-- Wifi --}}
                                <div class="col mb-3 row">
                                    <div class="col align-self-center"><i
                                            class="fa-solid fa-wifi"></i> {{__("Include Wifi")}} <input
                                            class="col-1 form-check-input align-self-center m-1" name="wifi-{{$i}}"
                                            type="checkbox" id="wifi"></div>
                                </div>


                                {{-- Calls --}}
                                <div class="col mb-3 row">
                                    <div class="col align-self-center"><i
                                            class="fa-solid fa-tower-cell"></i> {{__("Include Calls")}} <input
                                            class="col-1 form-check-input align-self-center m-1" name="calls-{{$i}}"
                                            type="checkbox" id="calls"></div>
                                </div>


                                {{-- Food --}}
                                <div class="col mb-3 row">
                                    <div class="col align-self-center"><i
                                            class="fa-solid fa-utensils"></i> {{__("Include Food")}} <input
                                            class="col-1 form-check-input align-self-center m-1" type="checkbox"
                                            name="food-{{$i}}" id="food"></div>
                                </div>
                            </div>

                            <hr>
                        @endfor


                        <div>
                            <button class="btn btn-blue btn-block" type="submit"><i
                                    class="fa-solid fa-plus"></i> {{__('Create')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
