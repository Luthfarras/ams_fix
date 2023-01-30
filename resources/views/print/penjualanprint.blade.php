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

        table {
            width: 100%;
        }
        
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
            margin-top: -15px
        }
       th, td {
        width: auto;
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
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center">Data Penjualan</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'IND');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                 Dicetak : <span class="badge-blue">{{ $data }}</span>
            </p>
        </header>
        <table class="table table-bordered">
            <thead>
                <th class="nopenj">No</th>
                <th>Kode Penjualan</th>
                <th class="cust">Nama Customer</th>
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
                        @php
                            setlocale(LC_ALL, 'IND');
                            $tanggal = date_create($item->tanggal_kirim);
                            $tgl =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%d-%m-%Y');
                        @endphp
                        <td>{{ $tgl }}</td>
                        <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $item->keterangan }}</td>
                        @if ($item->status == 'Belum Lunas')
                            <td>{{ $item->status }}</td>
                        @else 
                            <td>{{ $item->status }}</td>
                        @endif
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="page-break">
        <h1 class="text-center">Data Penjualan Tahunan</h1>
        <table class="table table-bordered">
            <thead>
                <th class="nopenj">No</th>
                <th>Bulan</th>
                <th class="cust">Total</th>
            </thead>
            <tbody>
                @foreach ($penjualan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->kode }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
