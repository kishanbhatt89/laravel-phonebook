{{-- Main Navbar Start--}}
    <div class="main-navbar sticky-top bg-white">
        <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <ul class="navbar-nav border-left ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">

                        <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatars/default.png') }}" alt="User Avatar">

                        <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">

                        @auth
                            {{-- <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="material-icons text-danger">&#xE879;</i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth

                    </div>
                </li>
            </ul>
            <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons">&#xE5D2;</i>
                </a>
            </nav>
        </nav>
    </div>
{{-- Main Navbar End--}}
