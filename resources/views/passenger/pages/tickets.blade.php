@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Ticket Info')}}
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Payment Dashboard--}}
        <div class="row py4">
            <div class="col-sm-12 col-md-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('Tickets Info')}}</h1>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 text-center p-3">
                <img src="{{asset('/src/images/ticket.png')}}" style="width: 50vw;" class="img-fluid">
            </div>
        </div>



        <div class="container py-4 bg-main  rounded-3">
            <div class="m-3 row text-white">

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="text-blue py-3">
                        <h4>{{__('Flight Info')}}</h4>
                    </div>

                    {{-- Flight ID--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Flight ID')}}</h6>
                        <div class="col text-white-50">{{$flight->id}}</div>
                    </div>

                    {{-- origin--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Origin')}}</h6>
                        <div class="col text-white-50">{{$flight->origin}}</div>
                    </div>

                    {{-- destination--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Destination')}}</h6>
                        <div class="col text-white-50">{{$flight->destination}}</div>
                    </div>

                    {{-- Departure Time--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Departure Time')}}</h6>
                        <div class="col text-white-50">{{$flight->departure_time}}</div>
                    </div>

                    {{-- Departure Time--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Arrival Time')}}</h6>
                        <div class="col text-white-50">{{$flight->arrival_time}}</div>
                    </div>

                    {{-- Departure Time--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Date')}}</h6>
                        <div class="col text-white-50">{{$flight->date}}</div>
                    </div>

                </div>


                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="text-blue py-3">
                        <h4>{{__('Ticket Info Info')}}</h4>
                    </div>

                    {{-- Ticket ID--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Ticket ID')}}</h6>
                        <div class="col text-white-50">{{$ticket->id}}</div>
                    </div>

                    {{-- FirstName--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('FirstName')}}</h6>
                        <div class="col text-white-50">{{$ticket->Fname}}</div>
                    </div>

                    {{-- LastName--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('LastName')}}</h6>
                        <div class="col text-white-50">{{$ticket->Lname}}</div>
                    </div>

                    {{-- Class Type--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Class')}}</h6>
                        <div class="col text-white-50">{{$ticket->class_type}}</div>
                    </div>

                    {{-- food--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Include')}} {{__('Food')}}</h6>
                        <div class="col text-white-50">{{($ticket->incl_food == 1)? __('Yes') : __('No') }}</div>
                    </div>

                    {{-- wifi--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Include')}} {{__('wifi')}}</h6>
                        <div class="col text-white-50">{{($ticket->incl_wifi == 1)? __('Yes') : __('No') }}</div>
                    </div>

                    {{-- calls--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{__('Include')}} {{__('Calls')}}</h6>
                        <div class="col text-white-50">{{($ticket->incl_calls == 1)? __('Yes') : __('No') }}</div>
                    </div>

                    {{-- Class Type--}}
                    <div class="row">
                        <h6 class="col-4 text-white">{{'Ticket Price'}}</h6>
                        <div class="col text-white-50">{{$payment->amount}} SAR</div>
                    </div>


                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="text-danger m-3">{{__('Note')}} | {{__('When delete, your ticket price will not returned to you!')}}</div>
            <form method="POST" action="{{route('ticket.update',$ticket)}}">
                @csrf
                @method('PUT')
                <input type="text" name="status" value="deleted" hidden>
                <button type="submit" class="btn btn-block btn-danger"><i class="fa-solid fa-trash-can"></i> {{__('Delete Ticket')}}</button>
            </form>
        </div>
    </div>


@endsection
