<div class="container py-4">
    <form method="POST" action="{{ route('search-one-way')}}">
        @csrf
        @method('POST')


        <div class="row text-center">
            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i></div>
                <input type="search" class="form-control col" name="origin" placeholder="{{__('Origin')}}">
            </div>

            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center" for="origin"><i class="fa-solid fa-plane-arrival"></i></div>
                <select  class="form-control custom-select col" data-swplive="true" name="destination" aria-live="true"
                        required>
                    <option selected>Open this select menu</option>
                    @foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
                        <option value="{{$airport->code}}">{{$airport->code}}, {{$airport->name}}
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
            <button class="btn btn-blue btn-block" type="submit">{{__('Search')}}</button>
        </div>

    </form>
</div>


{{---}}
@foreach(\App\Http\Controllers\AirportsController::getAirportsInfo() as $airport)
    <option value="{{$airport->code}}">{{$airport->code}}, {{$airport->name}}
        , {{$airport->country}}</option>
@endforeach
{{---}}
