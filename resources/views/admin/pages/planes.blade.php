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
        @include('admin.pages.plane.plane_list')

    </div>
@endsection
