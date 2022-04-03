@extends('layouts.main')
@section('title', 'Profil')

@section('content')
<img src="{{ asset('images/blobs2.png') }}" alt="blobs2"
    style="position: absolute; margin-top: -185px; left: 966px; z-index: -1; width: 400px;">
<img src="{{ asset('images/blobs1.png') }}" alt="blobs1"
    style="position: absolute; margin-top: 231px; margin-left: -210px; z-index: -1; width: 400px;">
<div class="row justify-content-center mt-3">
    <div class="card bg-dark text-white" style="width: 10rem; height: 10rem;">
        @if (Auth::user()->photos)
        <img src="{{ asset('images/profil/'.Auth::user()->photos)}}" class="card-img" alt="Profil" name="foto"
            style="width:152px; margin-left: -9px; margin-top: 3px;">
        @else
        <img src="{{ asset('images/profil/profil.png')}}" class="card-img" alt="Profil" name="foto"
            style="width:152px; margin-left: -9px; margin-top: 3px;">
        @endif
        <div class="card-img-overlay">
            <a href="{{ route('profil.destroy', Auth::user()->id) }}"><i class="fa-solid fa-trash" style="margin-top: 110px"></i></a>
        </div>
    </div>
    <div class="col-md-8">
        <h1>Kemana Aje!</h1>
        <p>Catatan Perjalanan</p>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profil</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Info</button>
            </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @include('profil.navtabs.pills1')
            </div>
            {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @include('profil.navtabs.pills2')
            </div> --}}
        </div>
    </div>
</div>
@push('script')
<style>
    .icon-upload > input {
        display: none;
    }
</style>
@endpush
@endsection
