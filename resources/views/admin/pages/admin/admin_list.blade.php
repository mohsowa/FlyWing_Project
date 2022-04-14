<div class="container py-3">
    <table class="table table-borderless table-hover">
        <thead class="bg-main rounded">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\App\Models\Admin::all() as $admin)

            <tr>
                <th scope="row">{{$admin->id}}</th>
                <td>{{\App\Models\User::where('id',$admin->user_id)->first()->email}}</td>
                <td>{{\App\Models\User::where('id',$admin->user_id)->first()->Fname}} {{\App\Models\User::where('id',$admin->user_id)->first()->Lname}}</td>
                <td>{{$admin->role}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
