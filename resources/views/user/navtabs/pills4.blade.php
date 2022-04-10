<div class="card" style="width: 32rem;">
    <div class="card-body">
        <!-- <img src="{{ asset('images/pills1.jpg') }}" alt="image-" style="width: 30rem;"> -->
        <table class="table" style="border: none;">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Suhu tubuh</th>
      <th scope="col">Lokasi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($riwayat as $item)
    <tr>
      <th scope="row">{{ $item->user->name }}</th>
      <td scope="row">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
      <th scope="row">{{ $item->suhutubuh }}</th>
      <th scope="row">{{ $item->lokasi }}</th>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
