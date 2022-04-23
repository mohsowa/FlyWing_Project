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
        @foreach(\App\Models\Passenger::all() as $passenger)

            <tr>
                <th scope="row">{{$passenger->id}}</th>
                <td>{{\App\Models\User::where('id',$passenger->user_id)->first()->email}}</td>
                <td>{{\App\Models\User::where('id',$passenger->user_id)->first()->Fname}} {{\App\Models\User::where('id',$passenger->user_id)->first()->Lname}}</td>
                <td><a href="{{route('passenger.show',$passenger->id)}}" class="btn btn-primary-outline btn-sm btn-block"><i class="fa-solid fa-eye"></i> {{__('View')}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
