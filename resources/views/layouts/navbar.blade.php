<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">

           <img src="{{ asset('src/logo/logo.png') }}" alt="Logo" id="nav-logo" style="max-height: 20px">


        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">




            <div class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/home">{{__("Dashboard")}}<span class="sr-only">(current)</span></a>
                    </li>
                @endauth


                <li class="nav-item">
                    <a class="nav-link" href="#">{{__("About Us")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__("Contact Us")}}</a>
                </li>

            </div>



            <div class="navbar-nav">

                <!-- Language -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="@if(App::isLocale('en')) /lang/ar @else /lang/en  @endif">
                        <i class="fas fa-globe"></i>
                    </a>
                </li>




            <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->Fname  }} {{ Auth::user()->Lname  }}
                        </a>

                        <div class="dropdown-menu @if(App::isLocale('en')) dropdown-menu-end @else dropdown-menu-start  @endif" aria-labelledby="navbarDropdown">
                            <div class="text-center  m-1">
                                <div class="text-black-50 small">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>

        </div>
    </div>

</nav>


