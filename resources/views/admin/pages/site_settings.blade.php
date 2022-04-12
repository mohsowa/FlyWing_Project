@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Site Settings')}}@endsection

{{-- Nav Status --}}
@section('site-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        <h3 class="h3">Site Settings Page</h3>
    </div>

@endsection
