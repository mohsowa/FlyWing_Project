@php use App\Models\Passenger; @endphp
@php use App\Models\User; @endphp
<div class="container py-3">
    <table class="table table-borderless table-hover">
        <thead class="bg-main rounded">
        <tr>
            <th scope="col">{{__('Passenger ID')}}</th>
            <th scope="col">{{__('Email')}}</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Profile')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Passenger::all() as $passenger)

            <tr>
                <th scope="row">{{$passenger->id}}</th>
                <td>{{User::where('id',$passenger->user_id)->first()->email}}</td>
                <td>{{User::where('id',$passenger->user_id)->first()->Fname}} {{User::where('id',$passenger->user_id)->first()->Lname}}</td>
                <td><a href="{{route('passenger.show',$passenger->id)}}"
                       class="btn btn-primary-outline btn-sm btn-block"><i class="fa-solid fa-eye"></i> {{__('View')}}
                    </a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
