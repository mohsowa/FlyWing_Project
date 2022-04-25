@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Planes')}}@endsection

{{-- Nav Status --}}
@section('plane-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Admin Dashboard--}}
        <div class="row py-3">
            <div class="col-sm-12 col-md-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1 class="display-4">{{__('Planes Dashboard')}}</h1>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="{{asset('/src/images/plane.png')}}" style="width: 80vw;" class="img-fluid">
            </div>
        </div>

        {{--Create new Plane--}}
        @include('admin.pages.plane.new_plane')
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
                            type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="fa-solid fa-box-archive"></i> {{__('Old Flight')}}
                    </button>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="flight_list" role="tabpanel"
                     aria-labelledby="flight_list-tab"> @include('admin.pages.flight.flight_list') </div>
                <div class="tab-pane fade" id="profile" role="tabpanel"
                     aria-labelledby="old_flight-tab">@include('admin.pages.flight.old_flight')</div>
            </div>

        </div>

    </div>
@endsection
