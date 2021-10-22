<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $data['description'] ?? '' }}" />
    <meta name="author" content="{{ $data['author'] ?? '' }}" />
    <title>{{ config('app.name', 'Laravel') }} - {{ $data['title'] ?? '' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-light bg-light bg-gradient weed-border-bottom">
            <div class="container-md weed">
                @if (Route::is('login'))
                    <div style="height: 46px;">
                        {{-- <div style="line-height: 60px;"> --}}
                        {{-- <a class="navbar-brand"
                    href="{{ route('home') }}"><b>S</b><b>w</b><b>ee</b><b>t</b><b>d</b>Cafe<span><b>4</b><b>:</b><b>2</b><b>0</b></span></a> --}}
                    </div>
                @else
                    <div >
                        <a class="navbar-brand weed logo"
                            href="{{ route('home') }}"><b>S</b><b>w</b><b>ee</b><b>t</b><b>d</b>Home<span><b>4</b><b>:</b><b>2</b><b>0</b></span></a>
                    </div>
                @endif
                
                        @guest
                        <button type="button" class="navbar-toggler " data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse  navbar-collapse justify-content-end " id="navbarSupportedContent">
                            <ul class="navbar-nav mb-lg-0 ">
                        @if (!Route::is('alien.*'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">login</a>
                                {{-- <a class="nav-link active" aria-current="page" href="{{ route('login') }}">login</a> --}}
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('register') }}">register</a>
                            </li>
                        
                        @endif
                    </ul>
                </div>
                        @else
                        <div class="btn-group">
                            <a class="btn" href="#">{{auth()->user()->username}}</a>
                            <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                              <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="top: 48px;">
                            @can('update', auth()->user())
                            <li><a class="dropdown-item" href="{{ route('profile',['user'=>auth()->user()]) }}" >
                                {{ __('Profile') }}
                            </a></li>
                            @endcan
                              
                             
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
       {{ __('Logout') }}
   </a></li>
   <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                            </ul>
                          </div>
                        @endguest


                   
                
                
                @guest
                <ul class="dropdown-menu dropdown-menu-end" style="    right: 0.6rem;">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    <li><a class="dropdown-item"  href="{{ route('register') }}">Register</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
                  @else

                @endguest
            
            </div>
        </nav>
        <div >

            <!-- Sidebar -->
            {{-- <nav id="sidebar">
                ...
            </nav> --}}

            <!-- Page Content -->
            <main class="content">
                @yield('content')
            </main>

        </div>


    </div>
</body>

</html>
