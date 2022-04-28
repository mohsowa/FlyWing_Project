@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('New Ticket')}}@endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Payment Dashboard--}}
        <div class="row">
            <div class="col-sm-12 col-md-6 text-center align-self-center ">
                <div class="align-self-center">
                    <h1>{{__('Book Now')}}</h1>
                </div>
            </div>
            <div class="bg-main">
            <div class="container">
                <form method="POST" action="{{ route('ticket.store')}}" autocomplete="off" onsubmit="return chickFlight(this)">
                    @csrf
                    @method('POST')


                    <div class="row text-center">

                        {{-- First Name --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-person"></i></div>
                            <input type="text" name="FirstName" value="{{old('FirstName')}}" placeholder="{{__('First Name')}}" class="form-control col">
                        </div>

                        {{-- Last Name --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"></div>
                            <input type="text" name="LastName" value="{{old('LastName')}}" placeholder="{{__('Last Name')}}" class="form-control col">
                        </div>

                    </div>
                    <div class="row text-center">

                        {{-- National ID --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-id-card"></i></div>
                            <input type="number" maxlength="10" minlength="10" name="nationalID" value="{{old('nationalID')}}" placeholder="{{__("National ID")}}" class="form-control col">
                        </div>

                        {{-- Passport --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-passport"></i></div>
                            <input type="text" name="passport" value="{{old('passport')}}" placeholder="{{__("Passport Number")}}" class="form-control col">
                        </div>

                    </div>

                    <div class="row text-center">

                        {{-- Phone Number --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-phone"></i></div>
                            <input type="number"  name="PhoneNumber" value="{{old('PhoneNumber')}}" placeholder="{{__("Example: 966512345678")}}" class="form-control col">
                        </div>
                        {{-- Gender --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-venus-mars"></i></div>
                            <select name="gender" class="col form-control js-example-basic-multiple">
                                <option value="select" disabled selected>{{__('Select Plane')}}</option>
                                <option value="male" name="name" >{{__('Male')}}</option>
                                <option value="male" name="name" >{{__('Female')}}</option>
                            </select>
                        </div>

                    </div>

                    <div class="row text-center">

                        {{-- Date of Birth --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-calendar-days"></i></div>
                            <input type="date" name="dob" value="{{old('dob')}}" class="form-control col" required>
                        </div>
                        <div class="col-lg mb-3 row">
                        </div>
                        </div>
                    <div class="row text-center">

                        {{-- Wifi --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-wifi"></i>
                                <span>
                                    <label>{{__("Include Wifi?")}}</label>
                                </span>
                            </div>
                            <input class="form-check-input" type="checkbox" id="wifi" onchange="includeWifi(this)">
                        </div>
                    </div>
                    <div class="row text-center">

                        {{-- Calls --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-tower-cell"></i>
                                <span>
                                    <label>{{__("Include Calls?")}}</label>
                                </span>
                            </div>
                            <input class="form-check-input" type="checkbox" id="calls" onchange="includeCalls(this)">
                        </div>
                    </div>
                    <div class="row text-center">

                        {{-- Food --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-utensils"></i>
                                <span>
                                    <label>{{__("Include Food?")}}</label>
                                </span>
                            </div>
                            <input class="form-check-input" type="checkbox" id="food" onchange="includeFood(this)">
                        </div>
                    </div>



                    <div class="">
                        <button class="btn btn-blue btn-block"  type="submit"><i class="fa-solid fa-plus"></i> {{__('Create')}}</button>
                    </div>
                </form>
            </div>
        </div>

        </div>
    </div>

@endsection
