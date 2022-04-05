@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg d-flex align-self-center order-lg-first order-md-first order-sm-last ">
            <div class="container text-center">
                <div class="">
                    <h1 class="h1 display-5 text-uppercase">{{__('START TRAVELING WITH US')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm order-sm-first ">
            <div class="plane">
                <img src="{{ asset('src/images/plane/plane.png') }}" class="img-fluid" alt="plane">
            </div>
        </div>
    </div>
</div>
@endsection
