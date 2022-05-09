@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name'){{__('Dashboard')}}@endsection

{{-- Nav Status --}}
@section('home-active') btn-primary-outline-active disabled @endsection

{{-- Content --}}
@section('service-content')

    {{-- Welcome Section--}}
    <div class="container py-3" >
        <div class="text-center">
            <div>
                <img src="{{asset('/src/images/welcome.png')}}" width="25%" class="img-fluid">
                <h3>{{__('Welcome')}}, {{Auth::user()->Fname}} {{Auth::user()->Lname}} </h3>
                <div class="text-black-50">{{__('You can start working now!')}}</div>
            </div>
        </div>
    </div>

    {{-- Content Section--}}
    <div class="container py-3" >
        <div class="row">

            {{-- Ticket Section--}}
            <div class="col-sm-12 col-md-12 col-lg-6 p-2 shadow-sm">

                <div class="text-center py-4">
                    <h3><i class="fa-solid fa-ticket-simple"></i> {{__('Ticket')}}</h3>
                </div>

                @php
                    $passenger = \App\Models\Passenger::where('user_id' , Auth::user()->id)->first();
                    $passenger_ticket = \App\Models\Ticket::where('passenger_id' ,$passenger->id)->where('status','temp')->get();

                @endphp
                {{-- Complete booking--}}
                @if($passenger_ticket->count() != 0)
                    <div class="text-center">
                        <a href="{{route('complete-payment')}}" class="btn btn-sm btn-block btn-primary-outline ">{{__('Complete booking Tickets')}}</a>
                    </div>
                    <hr>
                @endif

                {{-- Ticket table--}}
                @if(\App\Models\Ticket::where('passenger_id' ,$passenger->id)->get()->count() != 0)
                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <thead class="bg-main rounded">
                        <tr>
                            <th scope="col">{{__('Ticket ID')}}</th>
                            <th scope="col">{{__('Flight ID')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th scope="col">{{__('Detail')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach(\App\Models\Ticket::all() as $ticket)
                            @if($ticket->passenger_id == $passenger->id and $ticket->status != 'temp' and $ticket->status != 'deleted')
                                <tr>
                                    <th scope="row">{{$ticket->id}}</th>
                                    <td>{{$ticket->flight_id}}</td>
                                    <td>{{$ticket->Lname}}, {{$ticket->Fname}}</td>
                                    <td>{{$ticket->status}}</td>
                                    <td>
                                        <a href="{{route('ticket.show',$ticket)}}"
                                           class="btn btn-primary-outline btn-sm btn-block">
                                            <i class="fa-solid fa-eye"></i> {{__('View')}}
                                        </a>
                                    </td>

                                    @endif
                                </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
                @else
                    <div class="text-center">
                        {{__('No data is found')}}
                    </div>
                @endif



            </div>

           {{-- Payment Section--}}
           <div class="col-sm-12 col-md-12 col-lg-6 p-2 shadow-sm">

               <div class="text-center py-4">
                   <h3><i class="fa-solid fa-credit-card"></i> {{__('Payment')}}</h3>
               </div>

               {{-- Info Section--}}

               <div class="table-responsive">
                   <table class="table table-borderless table-hover">
                       <thead class="bg-main rounded">


                       <tr>

                           <th scope="col">{{__('Payment ID')}}</th>
                           <th scope="col">{{__('Operation ID')}}</th>
                           <th scope="col">{{__('Ticket ID')}}</th>
                           <th scope="col">{{__('Status')}}</th>
                           <th scope="col">{{__('Amount')}}</th>

                       </tr>
                       </thead>
                       <tbody>

                       @foreach(\App\Models\Payment::all() as $payment)

                           @php
                                $passenger = \App\Models\Passenger::where('user_id' , Auth::user()->id)->first();
                                $temp = \App\Models\TicketForPayment::where('payment_id', $payment->id)->first();
                                $ticket = \App\Models\Ticket::where('id',$temp->ticket_id)->first();
                           @endphp

                           @if($ticket->passenger_id == $passenger->id)
                           <tr>
                               <th scope="row">{{$payment->id}}</th>
                               <td>{{$payment->operation_id}}</td>
                               <td>{{$ticket->id}}</td>
                               <td>{{$payment->status}}</td>
                               <td>{{$payment->amount}} SAR</td>

                           </tr>
                           @endif

                       @endforeach

                       </tbody>
                   </table>
               </div>




           </div>


        </div>
    </div>





@endsection
