<div class="container py-4">
    <form method="POST" action="{{ route('search-one-way')}}" autocomplete="off" onsubmit="return chickAirport(this)">
        @csrf
        @method('POST')


        <div class="row text-center">
            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i></div>
                <select class="js-example-basic-multiple col form-control" name="origin"  required>
                    <option disabled selected>{{__('Select origin')}}</option>
                    @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                        <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                            , {{$airport->country}}</option>
                    @endforeach
                </select>

            </div>

            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-plane-arrival"></i></div>
                <select class="js-example-basic-multiple col form-control" name="destination"  required>
                    <option disabled selected>{{__('Select destination')}}</option>
                    @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                        <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                            , {{$airport->country}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="row text-center">
            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-calendar-days"></i></div>
                <input type="date" name="date" class="form-control col" required>
            </div>

            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-people-group"></i></div>
                <input type="number" name="passengers" value="1" max="10" min="1" class="form-control col" required>
            </div>

        </div>


        <div class="">
            <button class="btn btn-blue btn-block"  type="submit">{{__('Search')}}</button>
        </div>

    </form>
</div>


