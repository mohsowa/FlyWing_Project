@extends('home')
@section('page_title') @yield('sub_page_name',__('Home'))  @endsection

@section('main-content')

<div class="container" style="margin-top: 25vw; margin-bottom: 25vw;">
    <div class="text-center">
        <div class="spinner-border" style="color: #42277F; width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="text-center text-black-50">{{__('Your registration request is under review !')}}</div>
    </div>
</div>

@endsection
