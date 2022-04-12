@extends('layouts.app')


@section('content')
<div class="container py-4 p-5">
    <div class="">
        <h3 class="h3">{{__('Welcome')}}, {{ Auth::user()->Fname  }} {{ Auth::user()->Lname  }}</h3>
    </div>
</div>

@yield('main-content')


@endsection
