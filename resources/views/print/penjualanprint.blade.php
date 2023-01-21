<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Penjualan</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center">Data Penjualan</h1>
        </header>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Kode Penjualan</th>
                <th>Nama Customer</th>
                <th>Tanggal Kirim</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->customer->nama_customer }}</td>
                        <td>{{ $item->tanggal_kirim }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
