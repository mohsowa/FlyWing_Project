@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Payments')}}@endsection

{{-- Nav Status --}}
@section('payment-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <h3 class="h3">Payment Page</h3>
    </div>


@endsection
