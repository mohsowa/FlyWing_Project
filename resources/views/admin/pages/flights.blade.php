@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Flights')}}@endsection

{{-- Nav Status --}}
@section('flight-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <div class="text-center py-5">
            <h1>{{__('Flight Dashboard')}}</h1>
        </div>
        {{--Create new Flight--}}
        @include('admin.pages.flight.new_flight')
        <hr>

        {{--Section List--}}
        <div class="container py-3">

            <ul class="nav nav-tabs section_nav_tab" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="flight_list-tab" data-bs-toggle="tab"
                            data-bs-target="#flight_list" type="button" role="tab" aria-controls="flight_list"
                            aria-selected="true"> <i class="fa-solid fa-list"></i> {{__('Current Flight List')}}
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="old_flight-tab" data-bs-toggle="tab" data-bs-target="#old_flight"
                            type="button" role="tab" aria-controls="old_flight" aria-selected="true"><i class="fa-solid fa-box-archive"></i> {{__('Old Flight')}}
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="flight_list" role="tabpanel"
                     aria-labelledby="flight_list-tab"> @include('admin.pages.flight.flight_list') </div>
                <div class="tab-pane fade" id="old_flight" role="tabpanel"
                     aria-labelledby="old_flight-tab">@include('admin.pages.flight.old_flight')</div>
            </div>

        </div>

    </div>
@endsection
