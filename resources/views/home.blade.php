@extends('layouts.app')
@section('page_title') {{__('HOME')}} @endsection

@section('content')
<div class="container py-5">
    <div class="">
        <h3 class="h3">{{__('Welcome')}}, {{ Auth::user()->Fname  }} {{ Auth::user()->Lname  }}</h3>
    </div>
    <div>

        @if(\App\Models\User::isAdmin())
            here 1
        @else
            here 2
        @endif

    </div>
</div>
@endsection
