<div class="container py-2">
    <form method="POST" action="{{ route('search-one-way')}}" autocomplete="off" onsubmit="return chickAirport(this)">
        @csrf
        @method('POST')

        {{-- Include select origin and destination--}}
        @include('layouts.__config.airports_select_form')

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


