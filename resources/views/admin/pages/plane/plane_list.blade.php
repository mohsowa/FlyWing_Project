@php use App\Models\Plane; @endphp
<div class="container py-3">

    <h3 class="h3">{{__('Planes List')}}</h3>
    {{--Display Planes List--}}
    <div class="table-responsive-xxl">
        <table class="table  table-borderless table-hover">
            <thead class="bg-main rounded">
            <tr>
                <th scope="col">{{__('Plane ID')}}</th>
                <th scope="col">{{__('Type')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col"><i class="fa-solid fa-calendar-days"></i> {{__('Last Maintenance')}}</th>
                <th scope="col"><i class="fa-solid fa-calendar-days"></i> {{__('Next Maintenance')}}</th>
                <th scope="col">{{__('Details')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Plane::all() as $plane)

                <tr>
                    <th scope="row">{{$plane->id}}</th>
                    <td><i class="fa-solid fa-plane-up"></i> {{$plane->aircraft_type}}</td>
                    <td>{{$plane->status}}</td>
                    <td>{{$plane->last_maintenance_date}}</td>
                    <td>{{$plane->next_maintenance_date}}</td>
                    <td>
                        <a href="{{route('plane.show',$plane->id)}}" class="btn btn-primary-outline btn-sm btn-block"><i
                                    class="fa-solid fa-eye"></i> {{__('View')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>
