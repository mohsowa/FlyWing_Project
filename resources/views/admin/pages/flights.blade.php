@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Flights')}}@endsection

{{-- Nav Status --}}
@section('flight-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <h3 class="h3">Flight Page</h3>
    </div>

@endsection
