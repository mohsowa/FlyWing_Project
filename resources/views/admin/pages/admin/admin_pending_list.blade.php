<div class="container table-responsive py-3">
    <table class="table table-borderless table-hover">
        <thead class="bg-main rounded">
        <tr>
            <th scope="col">{{__('User ID')}}</th>
            <th scope="col">{{__('Email')}}</th>
            <th scope="col">{{__('Name')}}</th>
            <th scope="col">{{__('Role')}}</th>
            <th scope="col">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\User::all() as $user)
            @if(((\App\Models\Passenger::where('user_id',$user->id))->doesntExist()) && ((\App\Models\Admin::where('user_id',$user->id))->doesntExist()))
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->email}}</td>
                    <td>{{$user->Fname}} {{$user->Lname}}</td>

                    <td>
                        <form method="POST" action="{{route('admin.store')}}"  enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input name="user_id" value="{{$user->id}}" hidden>
                            <div class="row mb-3">
                                <select name="role" class="form-select form-select-sm col" required>
                                    <option value="system_organizer" selected>{{__('System organizer')}}</option>
                                    <option value="supervisor">{{__('Supervisor')}}</option>
                                    <option value="monitor">{{__('Monitor')}}</option>
                                    <option value="flight_organizer">{{__('Flight organizer')}}</option>
                                </select>
                                <button class="btn btn-sm btn-block btn-outline-success col" type="submit" >{{__('Accept')}}</button>
                            </div>


                        </form>
                    </td>

                    <td>
                        <form method="POST" action="{{route('passenger.store')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="user_id" value="{{$user->id}}" hidden>
                            <button class="btn btn-sm btn-block btn-primary-outline " type="submit" >{{__('Move to Passengers')}}</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
