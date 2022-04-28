@extends('layouts.app')

@section('content')
    <section class="heading">
        <!-- Header section -->
        @include('welcome.header')

        <!-- Search Section -->
        @include('welcome.search')

        <!--recent_tickets-->
        @include('welcome.recent_flights')
    </section>

@endsection
