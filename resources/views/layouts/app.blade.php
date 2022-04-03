<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/dist/easytimer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @auth
                <a class="navbar-brand" href="{{ route('user.dash') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('show.user'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show.user') }}">{{ __('Login') }}</a>
                        </li>
                        @elseif(Route::has('show.admin'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show.admin') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <script>
                            window.addEventListener("load", function () {
                                var timer = new Timer();
                                timer.addEventListener('secondsUpdated', function (e) {
                                    document.getElementById('easytimer').innerHTML = timer
                                        .getTimeValues().toString();
                                });
                                timer.start();
                            });

                        </script>
                        <script>
                            function display_ct7() {
                                var x = new Date()
                                var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
                                hours = x.getHours() % 12;
                                hours = hours ? hours : 12;
                                hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

                                var minutes = x.getMinutes().toString()
                                minutes = minutes.length == 1 ? 0 + minutes : minutes;

                                var seconds = x.getSeconds().toString()
                                seconds = seconds.length == 1 ? 0 + seconds : seconds;

                                var month = (x.getMonth() + 1).toString();
                                month = month.length == 1 ? 0 + month : month;

                                var dt = x.getDate().toString();
                                dt = dt.length == 1 ? 0 + dt : dt;

                                var x1 = month + "/" + dt + "/" + x.getFullYear();
                                x1 = x1 + " - " + hours + ":" + minutes + ":" + seconds + " " + ampm;
                                document.getElementById('ct7').innerHTML = x1;
                                display_c7();
                            }

                            function display_c7() {
                                var refresh = 1000; // Refresh rate in milli seconds
                                mytime = setTimeout('display_ct7()', refresh)
                            }
                            display_c7()

                        </script>
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                                <span id="easytimer">00:00:00</span>
                                <br />
                                <span id="ct7" class="fs-6">00/00/0000 - 00:00:00</span>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-user"></i> {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} <i class="fa-solid fa-right-from-bracket"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('script')
</body>

</html>
