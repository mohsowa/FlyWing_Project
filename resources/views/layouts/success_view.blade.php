@extends('home')
@section('page_title') {{__('Access Denied')}}  @endsection

@section('main-content')

    <div class="container" style="margin-top: 25vw; margin-bottom: 25vw;">
        <div class="text-center">
            <h1 class="text-success" style="font-size: 72pt"><i class="fa-solid fa-check"></i></h1>
            <h2>{{__('Done Successfully')}}</h2>
            <div>
                {{$message ?? ''}}
            </div>
            <br>
            <a class="btn btn-primary-outline btn-sm" href="{{route('home')}}">{{__('Back th Home')}}</a>
        </div>
    </div>

@endsection
