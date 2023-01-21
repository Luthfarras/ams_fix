<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Faktur Pajak</title>
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
            <h1 class="text-center">Data Laporan Faktur Pajak</h1>
        </header>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Kode Laporan</th>
                <th>Nama Customer</th>
                <th>Tanggal Customer</th>
                <th>No. Faktur Pajak</th>
                <th>Tanggal Upload</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                @foreach ($pajak as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_laporan }}</td>
                        <td>{{ $item->customer->nama_customer }}</td>
                        <td>{{ $item->tanggal_rep }}</td>
                        <td>{{ $item->no_fakpajak }}</td>
                        <td>{{ $item->tanggal_upload }}</td>
                        <td>{{ $item->ket_rep }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
