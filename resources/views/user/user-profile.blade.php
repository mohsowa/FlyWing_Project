@php use App\Models\Admin; @endphp
@php use App\Models\Passenger; @endphp
@extends('home')
@section('page_title')
    @yield('sub_page_name',__('Profile'))
@endsection

@section('main-content')

    <div class="container py-3">

        {{-- Head Section--}}
        <div class="row py-4">
            <div class="col-6 text-center align-self-center">
                <div class="align-self-center">
                    <h1>{{__('User Profile')}}</h1>
                </div>
            </div>
            <div class="col-6">
                <img src="{{asset('/src/images/user.png')}}" style="width: 30vw;" class="img-fluid">
            </div>
        </div>

        {{-- User Section--}}
        <div class="bg-main rounded-3">
            <div class="mb-3 container">

                <div class="text-center py-4">
                    <h4> {{__('User Info')}}</h4>
                </div>

                <div class="container py-4 p-4">

                    {{--Main Info--}}
                    <div>

                        <div class="row text-center">

                            {{-- ID --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-fingerprint"></i>
                                    <div>{{__('User ID')}}</div>
                                </div>
                                <input type="number" value="{{$user->id}}"
                                       style="background-color: rgba(255,255,255,0.3); pointer-events: none;"
                                       class="form-control col" disabled required>
                            </div>

                            @if($is_admin === true)

                                {{-- ID --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-fingerprint"></i>
                                        <div>{{__('Admin ID')}}</div>
                                    </div>
                                    <input type="number"
                                           value="{{Admin::where('user_id',$user->id)->first()->id}}"
                                           style="background-color: rgba(255,255,255,0.3); pointer-events: none;"
                                           class="form-control col" disabled required>
                                </div>
                            @else
                                {{-- ID --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-fingerprint"></i>
                                        <div>{{__('Passenger ID')}}</div>
                                    </div>
                                    <input type="number"
                                           value="{{Passenger::where('user_id',$user->id)->first()->id}}"
                                           style="background-color: rgba(255,255,255,0.3); pointer-events: none;"
                                           class="form-control col" disabled required>
                                </div>

                            @endif

                        </div>

                        <div class="row text-center">

                            {{-- Email --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i class="fa-solid fa-at"></i></div>
                                <input type="email" value="{{$user->email}}" class="form-control col"
                                       style="background-color: rgba(255,255,255,0.3); pointer-events: none;" required>
                            </div>

                            @if($user->email_verified_at != null)
                                {{-- email_verified_at --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i
                                                class="fa-solid fa-at"></i></div>
                                    <input type="text" value="{{$user->email_verified_at}}" class="form-control col"
                                           style="background-color: rgba(255,255,255,0.3); pointer-events: none;"
                                           required>
                                </div>
                            @else
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i
                                                class="fa-solid fa-at"></i></div>
                                    <a href="{{route('verification.notice')}}"
                                       class="col btn btn-warning">{{__('Verify your email')}}</a>
                                </div>
                            @endif

                        </div>

                        <br>
                        <hr>
                    </div>


                    {{--Change Name--}}
                    <form method="POST" action="{{route('change_name')}}" autocomplete="off">
                        @csrf
                        @method('POST')
                        <div class="row text-center">

                            {{-- First Name --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i
                                            class="fa-solid fa-pen"></i> {{__('FirstName')}}</div>
                                <input type="text" name="Fname" value="{{$user->Fname}}" class="form-control col"
                                       required>
                            </div>

                            {{-- Last Name --}}
                            <div class="col-lg mb-3 row">
                                <div class="col-3 align-self-center"><i
                                            class="fa-solid fa-pen"></i> {{__('LastName')}}</div>
                                <input type="text" name="Lname" value="{{$user->Lname}}" class="form-control col"
                                       required>
                            </div>

                        </div>

                        <div>
                            <button class="btn btn-blue btn-block" type="submit"><i
                                        class="fa-solid fa-pencil"></i> {{__('Update Name')}}</button>
                        </div>

                    </form>


                    {{--Passenger Info--}}
                    @if($is_passenger)
                        {{--Change Name--}}
                        <form method="POST"
                              action="{{route('passenger.update',Passenger::where('user_id',$user->id)->first())}}"
                              autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <div class="row text-center">

                                {{-- DOB --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-calendar"></i>
                                        <div>{{__('Date of Birth')}}</div>
                                    </div>
                                    <input type="date" name="dob"
                                           value="{{Passenger::where('user_id',$user->id)->first()->date_of_birth}}"
                                           class="form-control col" required>
                                </div>

                                {{-- Sex --}}
                                <div class="col-lg mb-3 row">
                                    <div class="col-3 align-self-center"><i class="fa-solid fa-venus-mars"></i></div>
                                    <select name="sex" class="col form-control js-example-basic-multiple" required>
                                        <option value="select" disabled
                                                @if(Passenger::where('user_id',$user->id)->first()->sex == null )selected @endif>{{__('Select Sex')}}</option>
                                        <option value="male"
                                                @if(Passenger::where('user_id',$user->id)->first()->sex == 'male')selected @endif>{{__('Male')}}</option>
                                        <option value="female"
                                                @if(Passenger::where('user_id',$user->id)->first()->sex == 'female')selected @endif>{{__('Female')}}</option>
                                    </select>
                                </div>


                            </div>

                            <div>
                                <button class="btn btn-blue btn-block" type="submit"><i
                                            class="fa-solid fa-pencil"></i> {{__('Update Name')}}</button>
                            </div>

                        </form>

                    @endif

                    {{--Change Password--}}
                    {{----}}


                </div>
            </div>
        </div>

        @endsection

        @section('chang-password')
            <br>
            <hr>
            <form method="POST" action="" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row text-center">

                    {{-- Password --}}
                    <div class="col-lg mb-3 row">
                        <div class="col-3 align-self-center"><i class="fa-solid fa-key"></i></div>
                        <input type="password" name="password"
                               class="form-control col @error('password') is-invalid @enderror"
                               placeholder="{{ __('Password') }}" autocomplete="new-password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    {{-- Confirm --}}
                    <div class="col-lg mb-3 row">
                        <div class="col-3 align-self-center"><i class="fa-solid fa-key"></i></div>
                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"
                               name="password_confirmation" autocomplete="new-password" class="form-control col"
                               required>
                    </div>
                </div>

                <div>
                    <button class="btn btn-danger btn-block" type="submit"><i
                                class="fa-solid fa-pencil"></i> {{__('Change Password')}}</button>
                </div>
            </form>
@endsection
