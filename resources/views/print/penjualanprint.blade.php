<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Customer</title>
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
            <h1 class="text-center">Data Customer</h1>
        </header>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Alamat Customer</th>
                <th>Telepon</th>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_customer }}</td>
                        <td>{{ $item->nama_customer }}</td>
                        <td>{{ $item->alamat_customer }}</td>
                        <td>{{ $item->telepon_customer }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
