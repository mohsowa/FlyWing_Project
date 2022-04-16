@extends('home')
@section('page_title') @yield('sub_page_name',__('Home'))  @endsection

@section('main-content')
{{-- Main Admin Nav--}}
Passenger Page
<div class="container">
    <nav class="nav btn-group">
        <a class="nav-item btn btn-sm @yield('admin-active','btn-primary-outline')" href="{{ route('admin.index') }}"><i class="fa-solid fa-user-gear"></i> {{__('Admins')}}</a>
        <a class="nav-item btn btn-sm @yield('passenger-active','btn-primary-outline')" href="{{ route('passenger.index') }}"><i class="fa-solid fa-users"></i>  {{__('Passengers')}}</a>
        <a class="nav-item btn btn-sm @yield('flight-active','btn-primary-outline')" href="{{ route('flight.index') }}"><i class="fa-solid fa-calendar-check"></i>  {{__('Flights')}}</a>
        <a class="nav-item btn btn-sm @yield('payment-active','btn-primary-outline')" href="{{ route('payment.index') }}"><i class="fa-solid fa-credit-card"></i>  {{__('Payments')}}</a>
        <a class="nav-item btn btn-sm @yield('ticket-active','btn-primary-outline')" href="{{ route('ticket.index') }}"><i class="fa-solid fa-ticket"></i> {{__('Tickets')}}</a>
        <a class="nav-item btn btn-sm @yield('site-active','btn-primary-outline')" href="/home"><i class="fa-solid fa-server"></i> {{__('Site Settings')}}</a>
    </nav>
</div>

        <div class="py-2">
            <div class="container">
                <hr>
            </div>
            @yield('service-content', View::make('layouts.waiting'))
        </div>


@endsection
