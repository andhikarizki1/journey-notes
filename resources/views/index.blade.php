@extends('layouts.home')
@section('title', 'Selamat Datang!')

@section('content')

@include('layouts.component_partial.navbar')
<img src="{{ asset('images/blobs2.png') }}" alt="blobs2"
    style="position: absolute; margin-top: -200px; left: 966px; z-index: -1; width: 400px;">
<img src="{{ asset('images/blobs1.png') }}" alt="blobs1"
    style="position: absolute; margin-top: 210px; margin-left: -210px; z-index: -1; width: 400px;">
{{-- <div class="d-flex mt-3">
    <div class="flex-shrink-0">
        <img src="{{ asset('images/foto-profil.png') }}" alt="profil" width="150">
    </div>
    <div class="flex-grow-1 ms-3">
        <h2>Kemana</h2>
        <h2>Aje!</h2>
        <h5 class="mt-3">Catatan Perjalanan</h2>
    </div>
</div> --}}
<div class="row row-cols-2 mt-3">
    <div class="col mt-3">
        <h1>Selamat Datang</h1>
            {{-- <h2 class="mt-3"><mark>ANGKASA RAYA</mark></h2> --}}
            <h2>Ayo Catat Perjalanan Kamu</h2>
            <h2>di aplikasi Kemana Aje!</h2>
            <div class="d-grid gap-2 col-8 mt-5 ms-1">
                <a href="{{ route('show.user') }}" class="btn btn-lg" style="background-color: orangered; color: white; border-radius: 15px;">Catatan Perjalanan Baru</a>
            </div>
    </div>
    <div class="col mt-0">
        <img src="{{ asset('images/traveling.png') }}" alt="traveling" width="619" height="450"
            style="border-radius: 18px;">
    </div>
</div>
@endsection
