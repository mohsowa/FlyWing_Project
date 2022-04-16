@extends('layouts.app')
@section('page_title') {{__('Register')}} @endsection

@section('content')
    <div class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                    <div class="card-login">
                        <div class="display-5 text-center">{{ __('Register') }}</div>
                        <br>
                        <div>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!--FirstName-->
                                <div class="mb-3">
                                    <div>
                                        <input id="name" type="text" placeholder="{{ __('FirstName') }}"
                                               class="form-control @error('Fname') is-invalid @enderror" name="Fname"
                                               value="{{ old('Fname') }}" required autocomplete="name" autofocus>
                                        @error('Fname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <!--LastName-->
                                <div class="mb-3">
                                    <input id="name" type="text" placeholder="{{ __('LastName') }}"
                                           class="form-control @error('Lname') is-invalid @enderror" name="Lname"
                                           value="{{ old('Lname') }}" required autocomplete="name" autofocus>
                                    @error('Lname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!--Email-->
                                <div class="mb-3">
                                    <input id="email" placeholder="{{ __('Email Address') }}" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--Password-->
                                <div class="mb-3">
                                    <input id="password" type="password" placeholder="{{ __('Password') }}"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!--Password - confirm -->
                                <div class="mb-3">
                                    <input id="password-confirm" type="password" class="form-control"
                                           placeholder="{{ __('Confirm Password') }}"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>


                                <!--Account Type-->
                                <div class="mb-3">
                                    <div>{{__('Account Type')}}</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accountType" id="Radios1" value="Passenger" checked>
                                        <label class="form-check-label" for="Radios1">
                                            {{__('Passenger')}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accountType" id="Radios2" value="Admin">
                                        <label class="form-check-label" for="Radios2">
                                            {{__('Admin')}}
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                        <button type="submit" class="btn btn-blue btn-block">
                                            {{ __('Register') }}
                                        </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
