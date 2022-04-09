<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-family: Arial, Helvetica, sans-serif; color:orangered;letter-spacing: 0px;">
            <img src="{{ asset('images/logo-tb.png') }}" alt="logo tb" width="40" height="40" class="d-inline-block">
            <strong>Kemana Aje!</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            @if (Route::has('login.user'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    @if (auth()->user()->roles == 'user')
                    <a href="{{ route('user.dash') }}" type="button" class="btn btn-outline-light">Dasbor</a>
                    @elseif(auth()->user()->roles == 'admin')
                        <a href="{{ route('admin.dash') }}" type="button" class="btn btn-outline-light">Dasbor</a>
                    @endif
                @else
                        {{-- <a href="{{ route('show.user') }}" type="button" class="btn btn-outline-light" style="letter-spacing: 0px;">Masuk</a> --}}
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" type="button" class="btn btn-outline-light ms-1" style="letter-spacing: 0px; border-radius:15px;">Daftar</a>
                        @endif
                @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
