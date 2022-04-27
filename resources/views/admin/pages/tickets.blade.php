@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Tickets')}}@endsection

{{-- Nav Status --}}
@section('ticket-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Payment Dashboard--}}
        <div class="row">
            <div class="col-sm-12 col-md-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('Tickets Dashboard')}}</h1>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 text-center p-3">
                <img src="{{asset('/src/images/ticket.png')}}" style="width: 50vw;" class="img-fluid">
            </div>
        </div>
    </div>

@endsection
