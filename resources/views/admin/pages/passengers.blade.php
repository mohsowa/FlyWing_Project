@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Passengers')}}
@endsection

{{-- Nav Status --}}
@section('passenger-active')
    btn-primary-outline-active disabled
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container py-3">

        <ul class="nav nav-tabs section_nav_tab" id="myTab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="passenger_list-tab" data-bs-toggle="tab"
                        data-bs-target="#passenger_list" type="button" role="tab" aria-controls="admin_list"
                        aria-selected="true"><i class="fa-solid fa-users-rectangle"></i> {{__('Passengers List')}}
                </button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="passenger_list" role="tabpanel"
                 aria-labelledby="passenger_list-tab"> @include('admin.pages.passengers.passengers_list') </div>
        </div>

    </div>

@endsection
