@extends('layouts.main')
@section('title', 'Dashboard')

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
    </div>
    <div class="col-md-8">
        <h1>Kemana Aje!</h1>
        <p>Catatan Perjalanan</p>
        <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Beranda</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Catatan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Isi Data Perjalanan</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @include('user.navtabs.pills1')
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @include('user.navtabs.pills2')
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                @include('user.navtabs.pills3')
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function () {
        const oTable = $('#datatable').DataTable({
            paginationType: "full_numbers",
            info: true,
            searching: true,
            serverside: true,
            processing: true,
            "responsive": true,
            "autoWidth": false,
            ajax: {
                url: "{{ route('user.ajax') }}",
                data: function (d) {
                    d.filcatat = $('#filter-catat').val();
                },
            },
            language: {
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "previous": "Sebelum",
                    "next": "Selanjutnya"
                },
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ catatan per-halaman",
                "zeroRecords": "Tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada catatan yang tersedia",
                "infoFiltered": "(filter dari _MAX_ total catatan)"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'tanggal',
                    name: 'tanggal'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
                },
                {
                    data: 'lokasi',
                    name: 'lokasi'
                },
                {
                    data: 'suhutubuh',
                    name: 'suhutubuh'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
        });
        $('#filter-catat').on('change', function () {
            oTable.ajax.reload(null,false)
        });
    });
</script>
@endpush
@endsection
