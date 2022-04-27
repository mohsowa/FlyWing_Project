<div class="container table-responsive py-3">
    <table class="table table-borderless table-hover">
        <thead class="bg-main rounded">
        <tr>
            <th scope="col">{{__('Flight ID')}}</th>
            <th scope="col">{{__('Status')}}</th>
            <th scope="col">{{__('Origin')}}</th>
            <th scope="col">{{__('Destination')}}</th>
            <th scope="col">{{__('Date')}}</th>
            <th scope="col">{{__('Detail')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Flight::all() as $flight)
            @if($flight->status == 'new')

                <tr>
                    <th scope="row">{{$flight->id}}</th>
                    <td>{{$flight->status}}</td>
                    <td>{{$flight->origin}}</td>
                    <td>{{$flight->destination}}</td>
                    <td>{{$flight->date}}</td>
                    <td>
                        <a href="{{route('flight.show',$flight->id)}}" class="btn btn-primary-outline btn-sm btn-block"><i class="fa-solid fa-eye"></i> {{__('View')}}</a>
                    </td>
                </tr>

            @endif
        @endforeach
        </tbody>
    </table>
</div>
