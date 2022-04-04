@extends('layouts.home')
@section('title', 'Daftar')

@section('content')
<div class="row justify-content-center mt-5">
    <style>
        body {
            background-image: url(https://images.unsplash.com/photo-1578894381163-e72c17f2d45f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8dHJhdmVsJTIwbWFwfGVufDB8fDB8fA%3D%3D&w=1000&q=80);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
    <div class="col-7">
        <div class="card ms-2" style="width: 40rem; height: 30rem;">
            <a href="/" class="text-decoration-none" style="color:orangered; letter-spacing: 0px;"><h1 class="text-center mt-5">Kemana Aje!</h1></a>
            <h4 class="text-center mb-5" style="letter-spacing: 0px;">Catat Perjalanan Kamu</h4>
            <div class="card-body">
                <form method="POST" action="{{ route('register.create') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end" style="letter-spacing: 0px;">{{ __('NIK') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="number"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" placeholder="Masukan NIK Anda" autocomplete="new-password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert" style="letter-spacing: 0px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end" style="letter-spacing: 0px;">{{ __('Username') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" autocomplete="username" placeholder="Masukan Username Anda" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert" style="letter-spacing: 0px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end" style="letter-spacing: 0px;">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Masukan Email Anda" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert" style="letter-spacing: 0px;">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Daftar') }}
                            </button>

                            @if (Route::has('login.user'))
                                <a class="btn btn-link" href="{{ route('login.user') }}" style="letter-spacing: 0px;">
                                    {{ __('Sudah punya akun?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
