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
        <form action="{{ route('profil.update', Auth::user()->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-4 row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" placeholder="Masukan Nama"
                        value="{{ Auth::user()->name }}" class="form-control">
                </div>
            </div>
            <div class="mb-4 row">
                <label for="username" class="col-sm-2 col-form-label">Nama Pengguna</label>
                <div class="col-sm-10">
                    <input type="text" name="username" id="username" placeholder="Masukan Nama Pengguna"
                        value="{{ Auth::user()->username }}" class="form-control">
                </div>
            </div>
            <div class="mb-4 row">
                <label for="photos" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="photos" id="photos"/>
                </div>
            </div>
            <div class="mb-4 row">
                <label for="desc" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="desc" id="desc" rows="3">{{ Auth::user()->desc }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
