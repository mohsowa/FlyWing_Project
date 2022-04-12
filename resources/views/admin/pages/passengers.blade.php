@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Passengers')}}@endsection

{{-- Nav Status --}}
@section('passenger-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <h3 class="h3">Passengers Page</h3>
    </div>

@endsection
