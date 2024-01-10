@php use App\Models\Plane; @endphp
<div class="container py-3">
    <img src="{{asset('/src/images/cities.png')}}" class="img-fluid">
    <div class="bg-main">
        <div class="mb-3 container">

            <div class="text-center py-4">
                <h4> {{__('Create new Flight')}}</h4>
            </div>

            <div class="container py-4 p-4">
                <form method="POST" action="{{ route('flight.store')}}" autocomplete="off"
                      onsubmit="return chickFlight(this)">
                    @csrf
                    @method('POST')


                    {{-- Include select origin and destination--}}
                    @include('layouts.__config.airports_select_form')

                    <div class="row text-center">

                        {{-- Date --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-calendar-days"></i></div>
                            <input type="date" name="date" value="{{old('date')}}" class="form-control col" required>
                        </div>

                        {{-- Plane --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane"></i></div>
                            <select name="plane_id" class="col form-control js-example-basic-multiple">
                                <option value="select" disabled selected>{{__('Select Plane')}}</option>
                                @foreach(Plane::all() as $plane)
                                    @if($plane->status == 'active')
                                        <option value="{{$plane->id}}">{{$plane->id}}
                                            , {{$plane->aircraft_type}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row text-center">

                        {{-- departure_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-departure"></i><i
                                        class="fa-solid fa-clock"></i></div>
                            <input type="time" name="departure_time" value="{{old('departure_time')}}"
                                   class="form-control col">
                        </div>

                        {{-- arrival_time --}}
                        <div class="col-lg mb-3 row">
                            <div class="col-3 align-self-center"><i class="fa-solid fa-plane-arrival"></i><i
                                        class="fa-solid fa-clock"></i></div>
                            <input type="time" name="arrival_time" value="{{old('arrival_time')}}"
                                   class="form-control col">
                        </div>

                    </div>


                    <div class="">
                        <button class="btn btn-blue btn-block" type="submit"><i
                                    class="fa-solid fa-plus"></i> {{__('Create')}}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
