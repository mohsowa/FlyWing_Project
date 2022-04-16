<div class="container py-3">
    <table class="table table-borderless table-hover">
        <thead class="bg-main rounded">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
            <th scope="col">{{__('Remove')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Admin::all() as $admin)

            <tr>
                <th scope="row">{{$admin->id}}</th>
                <td>{{\App\Models\User::where('id',$admin->user_id)->first()->email}}</td>
                <td>{{\App\Models\User::where('id',$admin->user_id)->first()->Fname}} {{\App\Models\User::where('id',$admin->user_id)->first()->Lname}}</td>
                <td>
                    <form method="POST" action="{{route('admin.update',$admin)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input name="user_id" value="{{$admin->id}}" hidden>
                        <div class="row mb-3">
                            <select name="role" class="form-select form-select-sm col" required @if(Auth::user()->id == $admin->user_id) disabled @endif>
                                <option value="system_organizer" @if($admin->role == 'system_organizer') selected @endif>{{__('System organizer')}}</option>
                                <option value="supervisor" @if($admin->role == 'supervisor') selected @endif>{{__('Supervisor')}}</option>
                                <option value="monitor" @if($admin->role == 'monitor') selected @endif>{{__('Monitor')}}</option>
                                <option value="flight_organizer" @if($admin->role == 'flight_organizer') selected @endif>{{__('Flight organizer')}}</option>
                            </select>
                            <button class="btn btn-sm btn-block btn-outline-success col @if(Auth::user()->id == $admin->user_id) disabled @endif" type="submit" >{{__('Update')}}</button>
                        </div>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('admin.destroy',$admin)}}" enctype="multipart/form-data">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-block btn-outline-danger @if(Auth::user()->id == $admin->user_id) disabled @endif" type="submit" >{{__('Remove')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
