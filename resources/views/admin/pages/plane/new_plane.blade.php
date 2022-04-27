<div class="container py-3">

    <div class="bg-main" style="border-radius: 1.5rem">
        <div class="mb-3 container">

            <div class="text-center py-4">
                <h4> <i class="fa-solid fa-plane"></i> {{__('Add New Plane')}}</h4>
            </div>

            <div class="container py-4 p-4">
                <form method="POST" action="{{ route('plane.store')}}" autocomplete="off" onsubmit="return chickAirport(this)">
                    @csrf
                    @method('POST')



                    <div class="row p-2">
                        {{--L Side--}}
                        <div class="col-sm-12 col-md-6 mb-3">

                            {{--Form Title--}}
                            <div class="text-center">
                                <h5 class="h5">{{__('Plane Info')}}</h5>
                            </div>


                            {{--Form Input--}}

                               {{--status input--}}

                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><div><i class="fa-solid fa-check"></i></div><span>{{__('Status')}}</span></div>
                                <select class="col js-example-basic-multiple form-control" name="status" placeholder="{{__('Status')}}">
                                    <option selected>{{__('Select')}}</option>
                                    <option value="active" >{{__('Active')}}</option>
                                    <option value="inactive">{{__('Inactive')}}</option>
                                    <option value="u_maintenance">{{__('Under Maintenance')}}</option>
                                </select>
                            </div>
                               {{--Type input--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><div><i class="fa-solid fa-plane-up"></i></div><span>{{__('Aircraft Type')}}</span></div>
                                <select class="col js-example-basic-multiple form-control" name="type" placeholder="{{__('type')}}" required>
                                    <option>{{__('Select')}}</option>
                                    <option value="Boeing 747">{{__('Boeing 747')}}</option>
                                    <option value="Boeing 777">{{__('Boeing 777')}}</option>
                                    <option value="Boeing 787">{{__('Boeing 787')}}</option>
                                    <option value="Airbus A320">{{__('Airbus A320')}}</option>
                                    <option value="Airbus A330">{{__('Airbus A330')}}</option>
                                    <option value="Bombardier CRJ">{{__('Bombardier CRJ')}}</option>
                                    <option value="Cessna 172">{{__('Cessna 172')}}</option>
                                </select>
                            </div>
                              {{--First flight input--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><div><i class="fa-solid fa-calendar"></i></div> <span>{{__('First Flight Date')}}</span></div>
                                <input class="col form-control" type="date" id="fistFlightD" name="fistFlightD" value="{{old('fistFlightD')}}" placeholder="{{__('First Flight Date')}}" required>
                            </div>
                              {{--Last maintance input--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><div><i class="fa-solid fa-screwdriver-wrench"></i></div> <span>{{__('Last Maintenance')}}</span></div>
                                <input class="col form-control" type="date" name="LastMaintenance" value="{{old('LastMaintenance')}}" placeholder="{{__('Last Maintenance')}}" required>
                            </div>
                              {{--Next maintance input --}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><div><i class="fa-solid fa-arrow-right-long"></i><i class="fa-solid fa-screwdriver-wrench"></i></div> <span>{{__('Next Maintenance')}}</span></div>
                                <input class="col form-control" type="date" name="NextMaintenance" value="{{old('Next Maintenance')}}" placeholder="{{__('Next Maintenance')}}" required>
                            </div>




                        </div>

                        {{--R Side--}}
                        <div class="col-sm-12 col-md-6 mb-3">

                            {{--Form Title--}}
                            <div class="text-center">
                                <h5 class="h5">{{__('Aircraft Info')}}</h5>
                            </div>


                            {{--Form Input--}}

                                {{--First class seats input --}}
                                <div class="row mb-3">
                                    <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                                    <input class="col form-control" type="number" name="fistSeat" value="{{old('fistSeat')}}" placeholder="{{__('First Class Seates Number')}}" required>
                                </div>

                                {{--First class price--}}
                                <div class="row mb-3">
                                    <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                                    <input class="col form-control" type="number" name="fistPrice" value="{{old('firstPrice')}}" placeholder="{{__('First Class Price')}}" required>
                                </div>

                            {{--Business class seats--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                                <input class="col form-control" type="number" name="BusinessSeats" value="{{old('BusinessSeats')}}" placeholder="{{__('Business Class Seates Number')}}" required>
                            </div>
                            {{--Business class price--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                                <input class="col form-control" type="number" name="BusinessPrice" value="{{old('BusinessPrice')}}" placeholder="{{__('Business Class Price')}}" required>
                            </div>
                            {{--Economy class seats--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><i class="fa-solid fa-people-group"></i></div>
                                <input class="col form-control" type="number" name="EcoSeats" value="{{old('EcoSeats')}}" placeholder="{{__('Economy Class Seates Number')}}" required>
                            </div>
                            {{--Economy class Price--}}
                            <div class="row mb-3">
                                <div class="col-3 text-center align-self-center"><i class="fa-solid fa-money-bill"></i></div>
                                <input class="col form-control" type="number" name="EcoSeatsPrice" value="{{old('EcoPrice')}}" placeholder="{{__('Economy Class Price')}}" required>
                            </div>
                        </div>




                    </div>


                    <div class="">
                        <button class="btn btn-blue btn-block"  type="submit"><i class="fa-solid fa-plus"></i> {{__('Create')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
