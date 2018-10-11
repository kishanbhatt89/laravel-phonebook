<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @include('partials.header')

    <body class="h-100">

        <span id="app"></span>

        <div class="container-fluid">

            <div class="row">

                @include('partials.sidebar')

                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                    @include('partials.navbar')

                    <div class="main-content-container container-fluid px-4">

                        @yield('content')

                    </div>

                    @include('partials.footer')

                </main>
            </div>
        </div>

        @include('partials.footer-scripts')

    </body>
</html>
