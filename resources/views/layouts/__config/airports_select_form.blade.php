<div class="row text-center">
    <div class="col-lg mb-3 row">
        <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i></div>
        <select class="js-example-basic-multiple col form-control" name="origin"  required>
            <option value="select" disabled selected>{{__('Select origin')}}</option>
            @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                    , {{$airport->country}}</option>
            @endforeach
        </select>

    </div>

    <div class="col-lg mb-3 row">
        <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-plane-arrival"></i></div>
        <select class="js-example-basic-multiple col form-control" name="destination"  required>
            <option value="select" disabled selected>{{__('Select destination')}}</option>
            @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                <option value="{{$airport->code}}"> {{$airport->code}}, {{$airport->name}}
                    , {{$airport->country}}</option>
            @endforeach
        </select>
    </div>
</div>
