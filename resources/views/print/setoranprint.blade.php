<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Setoran</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
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
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center">Data Setoran</h1>
            <p class="text-center" id="tanggal">
                @php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
        </header>
        <table class="table table-bordered" style="width: 100%">
            <thead>
                <th>No</th>
                <th>Kode Setoran</th>
                <th>Nama Customer</th>
                <th>Tanggal Setoran</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
                <th>Foto</th>
            </thead>
            <tbody>
                @foreach ($setoran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_dep }}</td>
                        <td>{{ $item->customer->nama_customer }}</td>
                        @php
                            setlocale(LC_ALL, 'id-ID', 'id_ID');
                            $tanggal = date_create($item->tanggal_dep);
                            $tgl =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%d-%m-%Y');
                        @endphp
                        <td>{{ $tgl }}</td>
                        <td>{{ $item->jumlah_masuk }}</td>
                        <td>{{ $item->jumlah_keluar }}</td>
                        <td>{{ $item->ket_dep }}</td>
                        @if ($item->foto_dep == "-")
                            <td>-</td>
                        @else
                        <td><img src="{{ public_path('storage/' .$item->foto_dep) }}" width="100px" alt="" srcset=""></td>
                        @endif
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
