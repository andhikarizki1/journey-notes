<div class="card">
    <div class="card-body">
        <form action="{{ route('user.tambah') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="created_at" class="col-sm-2 col-form-label col-form-label">Tanggal & Hari</label>
                    <div class="col-sm-10">
                        <input type="date" name="created_at"
                            class="form-control @error('created_at') is-invalid @enderror"
                            value="{{ old('created_at') }}" id="created_at">
                    </div>
                    @error('created_at')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="updated_at" class="col-sm-2 col-form-label col-form-label">Waktu</label>
                    <div class="col">
                        <input type="time" name="updated_at"
                            class="form-control @error('updated_at') is-invalid @enderror"
                            value="{{ old('updated_at') }}" id="updated_at">
                    </div>
                    @error('updated_at')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="lokasi" class="col-sm-2 col-form-label col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <input type="text" name="lokasi" class="form-control form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}" id="lokasi">
                    </div>
                    @error('lokasi')
                        <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="suhutubuh" class="col-sm-2 col-form-label col-form-label">Suhu
                        Tubuh</label>
                    <div class="col-sm-10">
                        <input type="text" name="suhutubuh"
                            class="form-control @error('suhutubuh') is-invalid @enderror"
                            value="{{ old('suhutubuh') }}" id="suhutubuh">
                    </div>
                    @error('suhutubuh')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
