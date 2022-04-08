@extends('layouts.app')
@section('page_title') {{__('HOME')}} @endsection

@section('content')
<div class="container">
    <div class="">
        <h3 class="h3">{{__('Welcome')}}, {{ Auth::user()->name }}</h3>
    </div>
</div>
@endsection
