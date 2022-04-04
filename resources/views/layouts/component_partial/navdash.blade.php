<nav class="navbar navbar-expand-lg navbar-light mt-3">
    <div class="container">
        @if (Route::has('login.user'))
            @auth
                @if (Auth::user()->roles == 'user')
                <a class="navbar-brand" href="{{ route('user.dash') }}"
                    style="font-family: Arial, Helvetica, sans-serif; color:orangered;letter-spacing: 0px;">
                    <img src="{{ asset('images/logo-tb.png') }}" alt="logo tb" width="40" height="40" class="d-inline-block">
                    <strong>KemanaAje!</strong>
                </a>
                @elseif(Auth::user()->roles == 'admin')
                <a class="navbar-brand" href="{{ route('admin.dash') }}"
                    style="font-family: Arial, Helvetica, sans-serif; color:orangered;letter-spacing: 0px;">
                    <img src="{{ asset('images/logo-tb.png') }}" alt="logo tb" width="40" height="40" class="d-inline-block">
                    <strong>KemanaAje!</strong>
                </a>
                @endif
            @endauth
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenu2">
                    <span id="easytimer">00:00:00</span>
                    <br />
                    <span id="ct7" class="fs-6">00/00/0000 - 00:00:00</span>
                    <a class="dropdown-item" href="{{ route('profil', Auth::user()->id) }}">
                        <i class="fa-solid fa-user"></i> {{ __('Profil') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }} <i class="fa-solid fa-right-from-bracket"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
</nav>

@push('script')
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
@endpush
