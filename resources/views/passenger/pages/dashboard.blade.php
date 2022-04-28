@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Dashboard')}}@endsection

{{-- Nav Status --}}
@section('home-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    {{-- Welcome Section--}}
    <div class="container py-3" >
        <div class="text-center">
            <div>
                <img src="{{asset('/src/images/welcome.png')}}" width="25%" class="img-fluid">
                <h3>{{__('Welcome')}}, {{Auth::user()->Fname}} {{Auth::user()->Lname}} </h3>
                <div class="text-black-50">{{__('You can start working now!')}}</div>
            </div>
        </div>
    </div>


    <hr>
    {{-- Operation Section Section--}}
    @include('passenger.pages.tickets')

    <hr>
    <hr>
    {{-- Payment history Section --}}
    @include('passenger.pages.payments')
    <hr>


@endsection
