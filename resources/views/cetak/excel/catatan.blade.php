<table>
    <tr>
        <th colspan="6" align="center">Laporan Catatan</th>
    </tr>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama User</th>
            <th>Waktu</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Suhu Tubuh</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($catatan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->User->username }}</td>
            <td>{{ date('H:i', strtotime($item->updated_at)) }}</td>
            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
            <td>{{$item->lokasi}}</td>
            <td>{{$item->suhutubuh}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
