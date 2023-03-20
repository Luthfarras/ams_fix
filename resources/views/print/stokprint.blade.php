<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Stok Barang</title>
    <style>        
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        width: 100%
    }
    h1 {
        text-align: center;
    }
    p {
        text-align: center;
        margin-top: -15px
    }
    
    .badge-red {
        padding: 5px;
        background-color: red;
        color: white;
        border-radius: 6px;
        font-weight: bold;
    }
    .badge-blue {
        padding: 5px;
        background-color: blue;
        color: white;
        border-radius: 6px;
        font-weight: bold;
    }
    .text-warna {
            color: red;
        }
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center">Data Stok Barang</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
        </header>
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Nama Distributor</th>
                <th>Stok Masuk</th>
                <th>Tanggal Masuk</th>
            </thead>
            <tbody>
                @foreach ($stok as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->distributor->nama_distributor }}</td>
                        <td>{{ $item->stok_masuk }}</td>
                        @php
                            setlocale(LC_ALL, 'id-ID', 'id_ID');
                            $tanggal = date_create($item->tanggal_masuk);
                            $tgl =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%d-%m-%Y');
                        @endphp
                        <td>{{ $tgl }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
