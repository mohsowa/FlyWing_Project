<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'flywing') }} | @yield('page_title','Welcome')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('src/logo/logo_icon.svg')}}">

    <!-- Scripts -->
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDkS8-hD0el8TSCuk9IPaHuFI8k6zzT6VM",
            authDomain: "flywing-project-65989.firebaseapp.com",
            projectId: "flywing-project-65989",
            storageBucket: "flywing-project-65989.appspot.com",
            messagingSenderId: "761121009654",
            appId: "1:761121009654:web:528af4023f2cad9af621d7",
            measurementId: "G-51FYJ1GJ6M"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Almarai" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">


    {{--}}
    @auth
    @if(\App\Models\User::where('id' ,Auth::user()->id)->first()->email_verified_at == null)
        <div class="text-center alert-warning p-2">
            <div><a class="link-dark" href="verify"> {{__('Verify your email now !')}}</a></div>
        </div>
    @endif
    @endauth
    {{--}}

    @include('layouts.navbar')

    <main class="">
    @yield('content')
    </main>

    @include('layouts.footer')
</div>



</body>
</html>
