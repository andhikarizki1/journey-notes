<div class="card mt-3">
    <div class="card-body">
        <div class="container">
            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="col-4 mt-2">
                    <span>Urutkan Berdasarkan: </span>
                </div>
                <div class="input-group">
                    <select class="form-select" id="filter-catat">
                        <option value="">Pilih</option>
                        <option value="1">Tanggal</option>
                        <option value="2">Waktu</option>
                        <option value="3">Lokasi</option>
                        <option value="4">Suhu</option>
                    </select>
                    <div class="input-group-text" id="btnGroupAddon"><i class="fa-solid fa-filter"></i>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <a href="{{ route('exexcel') }}" class="btn btn-outline-success mb-3">Ekspor<i class="fa-solid fa-file-excel" style="height: 20px;"></i></a>
        <a href="{{ route('expdf') }}" class="btn btn-outline-danger mb-3">Ekspor<i class="fa-solid fa-file-pdf" style="height: 20px;"></i></a>
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered text-center dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                        <th>Suhu Tubuh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
