@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Flights')}}@endsection

{{-- Nav Status --}}
@section('flight-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container py-3">

        <ul class="nav nav-tabs section_nav_tab" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="current_flight_list-tab" data-bs-toggle="tab"
                        data-bs-target="#current_flight_list" type="button" role="tab"
                        aria-controls="current_flight_list"
                        aria-selected="true"><i class="fa-solid fa-list"></i> {{__('Current Flight List')}}
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="new_flight-tab" data-bs-toggle="tab"
                        data-bs-target="#new_flight" type="button" role="tab" aria-controls="new_flight"
                        aria-selected="true"><i class="fa-solid fa-plus"></i> {{__('New Flight')}}
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="old_flight-tab" data-bs-toggle="tab"
                        data-bs-target="#old_flight" type="button" role="tab" aria-controls="old_flight"
                        aria-selected="true"><i class="fa-solid fa-box-archive"></i> {{__('Old Flight')}}
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="planes-management-tab" data-bs-toggle="tab"
                        data-bs-target="#planes-management" type="button" role="tab" aria-controls="planes-management"
                        aria-selected="true"><i class="fa-solid fa-plane"></i> {{__('Planes Management')}}
                </button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="current_flight_list" role="tabpanel"
                 aria-labelledby="current_flight_list-tab"> @include('admin.pages.admin.admin_list') </div>

            <div class="tab-pane fade" id="new_flight" role="tabpanel"
                 aria-labelledby="new_flight-tab">@include('admin.pages.admin.admin_pending_list')</div>

            <div class="tab-pane fade" id="old_flight" role="tabpanel"
                 aria-labelledby="old_flight-tab"> @include('admin.pages.admin.admin_list') </div>

            <div class="tab-pane fade" id="planes-management" role="tabpanel"
                 aria-labelledby="planes-management-tab">@include('admin.pages.admin.admin_pending_list')</div>

        </div>

    </div>

@endsection
