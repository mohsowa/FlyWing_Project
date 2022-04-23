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
        <div class="row">
            <div class="col-sm-12 col-md-6">


                <div class="container py-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">
                                {{__('Passenger Info')}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                {{-- User ID --}}
                                <div class="col-4 text-body">
                                    {{__('User ID')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$user->id}}
                                </div>
                                {{----}}

                                {{-- Passenger ID --}}
                                <div class="col-4 text-body">
                                    {{__('Passenger ID')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$passenger->id}}
                                </div>
                                {{----}}

                                {{-- Email --}}
                                <div class="col-4 text-body">
                                    {{__('Email')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$user->email}}
                                </div>
                                {{----}}

                                {{-- Name --}}
                                <div class="col-4 text-body">
                                    {{__('Name')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$user->Fname}} {{$user->Lname}}
                                </div>
                                {{----}}

                                {{-- Date of Birth --}}
                                <div class="col-4 text-body">
                                    {{__('Date of Birth')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    @if($passenger->date_of_birth != '')
                                        {{$passenger->date_of_birth}}
                                    @else
                                        {{__('Not Set')}}
                                    @endif
                                </div>
                                {{----}}

                                {{-- Sex --}}
                                <div class="col-4 text-body">
                                    {{__('Sex')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    @if($passenger->sex != '')
                                        {{$passenger->sex}}
                                    @else
                                    {{__('Not Set')}}
                                    @endif
                                </div>
                                {{----}}

                                {{-- email_verified_at --}}
                                <div class="col-4 text-body">
                                    {{__('Email Verified Date')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    @if($user->email_verified_at != '')
                                        {{$user->email_verified_at}}
                                    @else
                                        <div class="text-danger">
                                            {{__('Not Verified')}}
                                        </div>
                                    @endif
                                </div>
                                {{----}}

                                {{-- Account Created --}}
                                <div class="col-4 text-body">
                                    {{__('Account Created')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$user->created_at}}
                                </div>
                                {{----}}

                                {{-- Account Last Update --}}
                                <div class="col-4 text-body">
                                    {{__('Last Update')}}
                                </div>
                                <div class="col-8 text-black-50">
                                    {{$user->updated_at}}
                                </div>
                                {{----}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
