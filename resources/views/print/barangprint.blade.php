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
            <h1 class="text-center">Data Barang</h1>
        </header>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Kode Harga</th>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Qty</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga Netto</th>
                <th>Keterangan</th>
                <th>Tanggal Kadaluarsa</th>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->kode_harga }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ number_format($item->harga_jual,0,",",".") }}</td>
                        <td>{{ $item->qty_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->satuan->nama_satuan }}</td>
                        <td>{{ number_format($item->harga_netto,0,",",".") }}</td>
                        <td>{{ $item->ket_barang }}</td>
                        <td>{{ $item->tgl_kadaluarsa }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
            <tfoot>
                <th colspan="4">TOTAL</th>
                <th>{{ number_format($jumlahjual,0,",",".") }}</th>
                <th></th>
                <th>{{ $jumlahstok }}</th>
                <th></th>
                <th>{{ number_format($jumlahnetto,0,",",".") }}</th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</body>

</html>
