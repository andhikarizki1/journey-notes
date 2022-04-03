@php
use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Catatan</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>

<body>
    <table>
        <thead>
            <th colspan="6">Laporan Catatan</th>
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
</body>

</html>
