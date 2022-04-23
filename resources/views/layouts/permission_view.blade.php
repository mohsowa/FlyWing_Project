@extends('home')
@section('page_title') {{__('Access Denied')}}  @endsection

@section('main-content')

    <div class="container" style="margin-top: 25vw; margin-bottom: 25vw;">
        <div class="text-center">
            <h1 class="text-danger" style="font-size: 72pt"><i class="fa-solid fa-circle-exclamation"></i></h1>
            <h2>{{__('Access Denied')}}</h2>
            <div>
                {{__('Sorry, You do not have a permission to access this page!')}}
            </div>
            <br>
            <a class="btn btn-primary-outline btn-sm" href="{{route('home')}}">{{__('Back th Home')}}</a>
        </div>
    </div>

@endsection
