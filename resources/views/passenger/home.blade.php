@extends('home')
@section('page_title') @yield('sub_page_name',__('Home'))  @endsection

@section('main-content')

    <div class="py-2">
        @yield('service-content', View::make('layouts.name_welcome'))
    </div>

@endsection
