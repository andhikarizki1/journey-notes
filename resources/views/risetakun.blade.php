@extends('layouts.main')
@section('title', 'Profil')

@section('content')
<img src="{{ asset('images/blobs2.png') }}" alt="blobs2"
    style="position: absolute; margin-top: -185px; left: 966px; z-index: -1; width: 400px;">
<img src="{{ asset('images/blobs1.png') }}" alt="blobs1"
    style="position: absolute; margin-top: 231px; margin-left: -210px; z-index: -1; width: 400px;">
<div class="row justify-content-center mt-3">
    <div class="card bg-dark text-white" style="width: 10rem; height: 10rem;">
        @if (Auth::user()->foto)
        <img src="{{ asset('images/profil/'.Auth::user()->foto)}}" class="card-img" alt="Profil" name="foto"
            style="width:152px; margin-left: -9px; margin-top: 3px;">
        @else
        <img src="{{ asset('images/profil/profil.png')}}" class="card-img" alt="Profil" name="foto"
            style="width:152px; margin-left: -9px; margin-top: 3px;">
        @endif
    </div>
    <div class="col-md-8">
        <h1>Kemana Aje!</h1>
        <p>Catatan Perjalanan</p>
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if (session('error'))
                <div class="container">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <form action="{{ route('profil.riset', Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="mb-4 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" id="username" placeholder="Masukan Nama Pengguna"
                                value="{{ Auth::user()->username }}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <label for="namalngkp" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="namalngkp" id="namalngkp" placeholder="Masukan Nama Lengkap"
                                value="{{ Auth::user()->namalngkp }}" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status" id="status" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="online" {{ $detailuser->status == 'online' ? 'selected' : '' }}>Online
                                </option>
                                <option value="offline" {{ $detailuser->status == 'offline' ? 'selected' : '' }}>Offline
                                </option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
