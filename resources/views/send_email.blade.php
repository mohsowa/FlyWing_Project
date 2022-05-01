
<html lang="{{config('app.locale')}}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">


</head>

<body style="border-radius: 25px;">
<div style="padding: 3%;">
    <div style="position: center;">
        <img src="{{ asset('src/logo/logo.png') }}" alt="Logo" id="nav-logo" style="max-height: 20px">
    </div>


    <div class="py-4">
            <h1 class="h1">{{__('Ticket Info')}}</h1>
    </div>

    <div class="container m-2">

        <div class="container py-4 bg-main  rounded-3">
            <div class="m-3 row text-white" style="padding: 1rem;">

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
                        <h6 class="col-4 text-white">{{__('Flight ID')}}</h6>
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
    </div>











</div>
</body>
</html>
