<div class="container py-2">
    <form method="POST" action="{{ route('search-one-way')}}" autocomplete="off" onsubmit="return chickAirport(this)">
        @csrf
        @method('POST')
        <div class="form-check form-switch mb-3" ><i class="fa-solid fa-arrow-right-arrow-left"></i>
            <label class="form-check-label" for="flexSwitchCheckDefault">{{__('Round-Trip')}}</label>
            <input class="form-check-input" type="checkbox" id="round-trip" onchange="roundTrip(this)">
        </div>
        {{-- Include select origin and destination--}}
        @include('layouts.__config.airports_select_form')

        <div class="row text-center">
            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center" ><i class="fa-solid fa-calendar-days"></i> <i class="fa-solid fa-plane-departure"></i> </div>
                <input type="date" name="date_go" class="form-control col" required>
            </div>

            <div class="col-lg mb-3 row">
                <div class="col-3 align-self-center"><i class="fa-solid fa-people-group"></i></div>
                <input type="number" name="passengers" value="1" max="10" min="1" class="form-control col" required>
            </div>

        </div>

        {{-- Away date box--}}
        <div id="awayDate" style="display: none">
            <div class="row text-center">
                <div class="col-lg mb-3 row">
                    <div  class="col-3 align-self-center" ><i class="fa-solid fa-calendar-days"></i> <i class="fa-solid fa-plane-arrival"></i></div>
                    <input type="date" name="date_back"  class="form-control col">
                </div>
                <div class="col-lg mb-3 row"></div>
            </div>
        </div>

        <div class="">
            <button class="btn btn-blue btn-block"  type="submit">{{__('Search')}}</button>
        </div>

    </form>
</div>


