@extends('admin.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Admins')}}@endsection

{{-- Nav Status --}}
@section('admin-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

<div class="container">

    <h3 class="h3">Admin Page</h3>
</div>

@endsection
