@extends('passenger.home')

{{-- Cange Page title --}}
@section('sub_page_name')
    {{__('Payment')}}
@endsection

{{-- Content --}}
@section('service-content')

    <div class="container">

        {{-- Head Section--}}
        <div class="row py-4">
            <div class="col-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('Complete Booking Ticket')}}</h1>
                </div>
            </div>
            <div class="col-6">
                <img src="{{asset('/src/images/payment.png')}}" style="width: 30vw;" class="img-fluid">
            </div>
        </div>

        {{-- Info Section--}}
        <div class="table-responsive">
            <table class="table table-borderless table-hover">
                <thead class="bg-main rounded">
                <tr>
                    <th scope="col">{{__('Ticket ID')}}</th>
                    <th scope="col">{{__('FirstName')}}</th>
                    <th scope="col">{{__('LastName')}}</th>
                    <th scope="col">{{__('Flight ID')}}</th>
                    <th scope="col"><i class="fa-solid fa-wifi"></i></th>
                    <th scope="col"><i class="fa-solid fa-bowl-food"></i></th>
                    <th scope="col"><i class="fa-solid fa-phone"></i></th>
                    <th scope="col"><i class="fa-solid fa-bag-shopping"></i></th>
                    <th scope="col">{{__('Price')}}</th>
                    <th scope="col">{{__('Remove')}}</th>

                </tr>
                </thead>
                <tbody>
                    @php $total_price = 0; @endphp
                @foreach($tickets_list as $ticket)

                    @if($ticket->status == 'temp')
                        @php
                            $flight = \App\Models\Flight::where('id',$ticket->flight_id)->first();
                            $aircraft = \App\Models\Aircraft::where('plane_id',$flight->plane_id)->first();

                            $local_Prise = 0;
                            if($ticket->type == 'economy'){
                               $local_Prise += $aircraft->price_econ_class;
                            }else if($ticket->type == 'business'){
                                $local_Prise += $aircraft->price_bus_class;
                            }else{
                            $local_Prise += $aircraft->price_first_class;
                            }

                            if($ticket->incl_wifi == 1 ) $local_Prise += $aircraft->price_wifi ;
                            if($ticket->incl_food == 1 ) $local_Prise += $aircraft->price_food ;
                            if($ticket->incl_phone_calls == 1 ) $local_Prise += $aircraft->price_calls;

                            $luggage = \App\Models\Luggage::where('ticket_id',$ticket->id)->first();
                            $local_Prise += $luggage->total_price;

                            $total_price += $local_Prise;
                        @endphp

                        <tr>
                            <th scope="row">{{$ticket->id}}</th>
                            <td>{{$ticket->Fname}}</td>
                            <td>{{$ticket->Lname}}</td>
                            <td>{{$ticket->flight_id}}</td>
                            <td>{{$ticket->incl_wifi == 1 ? 'Yes': 'No'}}</td>
                            <td>{{$ticket->incl_food == 1 ? 'Yes': 'No'}}</td>
                            <td>{{$ticket->incl_phone_calls == 1 ? 'Yes': 'No'}}</td>
                            <td>{{$luggage->quantity}} ({{$luggage->total_weight}} kg)</td>
                            <td>{{$local_Prise}}</td>
                            <td>
                                <form method="POST" action="{{route('ticket.destroy',$ticket)}}" enctype="multipart/form-data">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-block btn-outline-danger" type="submit" ><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endif

                @endforeach

                </tbody>
            </table>
        </div>


        {{-- Form Section--}}
        <div class="bg-main rounded-3 py-3">
            <div class="mb-3 container">


                <div class="container p-4">
                    <form method="POST" action="{{ route('payment.store')}}" autocomplete="off" >
                        @csrf
                        @method('POST')

                        <div class="row text-center">

                            {{-- Amount --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-money-bill"></i><div>{{__('Total (SAR)')}}</div></div>
                                <input type="number" name="amount" value="{{$total_price}}" style="background-color: rgba(255,255,255,0.3); pointer-events: none;" class="form-control col" required>
                            </div>

                            {{-- empty --}}
                            <div class="col-lg mb-3 row">

                            </div>

                        </div>

                        <div class="row text-center">

                            {{-- card number --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-credit-card"></i></div>
                                <input type="text" placeholder="--  --  --  -- " min="0" max="9999" minlength="4" maxlength="4"  pattern="[0-9]{4}" name="card_n_1" required class="form-control m-1 col">
                                <input type="text" placeholder="--  --  --  -- " min="0" max="9999" minlength="4" maxlength="4"  pattern="[0-9]{4}" name="card_n_2" required class="form-control m-1 col">
                                <input type="text" placeholder="--  --  --  -- " min="0" max="9999" minlength="4" maxlength="4"  pattern="[0-9]{4}" name="card_n_3" required class="form-control m-1 col">
                                <input type="text" placeholder="--  --  --  -- " min="0" max="9999" minlength="4" maxlength="4"  pattern="[0-9]{4}" name="card_n_4" required class="form-control m-1 col">
                            </div>

                            {{-- name on card --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-user"></i></div>
                                <input type="text" placeholder="{{__('Name on card')}}" name="name" value="{{old('arrival_time')}}" class="form-control col">
                            </div>

                        </div>

                        <div class="row text-center">

                            {{-- Epire info --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-money-bill"></i>{{__('EXP')}}</div>
                                <input type="month"  name="expire" placeholder="{{__('Month')}}"  class="form-control col" required>
                            </div>

                            {{-- empty --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-key"></i> {{__('CCV')}}</div>
                                <input type="number" name="ccv" min="0" max="999" maxlength="3" minlength="3" placeholder="{{__('Security Code')}}"  class="form-control col" required>
                            </div>

                        </div>


                        <div class="">
                            <button class="btn btn-blue btn-block"  type="submit"><i class="fa-solid fa-check"></i> {{__('Confirm')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
