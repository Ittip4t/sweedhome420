<!-- Navbar Brand-->
{{-- <a class="navbar-brand ps-3" href="index.html">Alien</a> --}}

{{-- <div class="d-flex flex-row"> --}}
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-3 ps-3" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
            <a class="navbar-brand  px-3" href="index.html">Alien</a>
    <div class="ms-auto "></div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-lg-1 ">
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw me-1"></i>{!! auth()->user()->username ?? 'Username' !!}</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('alien.profile',['user'=>auth()->user()])}}">Settings</a></li>
                {{-- <li><a class="dropdown-item"
                        href="{{ route('alien.user.edit', ['user' => auth()->user()->id]) }}">Settings</a></li> --}}
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

{{-- </div> --}}
