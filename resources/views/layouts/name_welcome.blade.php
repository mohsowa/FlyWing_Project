<div class="container" style="margin-top: 20vw; margin-bottom: 20vw;">
    <div class="text-center">
        <div>
            <img src="{{asset('/src/images/welcome.png')}}" width="50%" class="img-fluid">
            <h3>{{__('Welcome')}}, {{Auth::user()->Fname}} {{Auth::user()->Lname}} </h3>
            <div class="text-black-50">{{__('You can start working now!')}}</div>
        </div>
    </div>
</div>

