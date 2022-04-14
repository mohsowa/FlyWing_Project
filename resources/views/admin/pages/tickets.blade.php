@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Tickets')}}@endsection

{{-- Nav Status --}}
@section('ticket-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <h3 class="h3">Tickets Page</h3>
    </div>

@endsection
