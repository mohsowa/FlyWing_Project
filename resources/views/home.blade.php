@extends('layouts.app')
@section('page_title') {{__('HOME')}} @endsection

@section('content')
<div class="container py-5">
    <div class="">
        <h3 class="h3">{{__('Welcome')}}, {{ Auth::user()->Fname  }} {{ Auth::user()->Lname  }}</h3>
    </div>
    <div>


    </div>
</div>
@endsection
