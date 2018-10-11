{{-- Main Sidebar Start --}}
    <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">

        {{-- Sidebar Logo Start --}}
        <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                    <div class="d-table m-auto">
                        <span class="d-none d-md-inline ml-1">{{ config('app.name') }}</span>
                    </div>
                </a>
                <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                    <i class="material-icons">&#xE5C4;</i>
                </a>
            </nav>
        </div>
        {{-- Sidebar Logo End --}}

        {{-- Sidebar Start --}}
        <div class="nav-wrapper">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('phonebook.index') }}">
                        <i class="material-icons">contacts</i>
                        <span>Phonebook</span>
                    </a>
                </li>
            </ul>
        </div>
        {{-- Sidebar End --}}

    </aside>
{{-- Main Sidebar End --}}
