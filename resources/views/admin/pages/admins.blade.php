@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Admins')}}@endsection

{{-- Nav Status --}}
@section('admin-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

<div class="container py-3">

    <ul class="nav nav-tabs section_nav_tab" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="admin_list-tab" data-bs-toggle="tab" data-bs-target="#admin_list" type="button" role="tab" aria-controls="admin_list" aria-selected="true">{{__('Admins List')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">{{__('Admin Administrator')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('Admin Roles')}}</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="admin_list" role="tabpanel" aria-labelledby="admin_list-tab"> @include('admin.pages.admin.admin_list') </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>

</div>

@endsection
