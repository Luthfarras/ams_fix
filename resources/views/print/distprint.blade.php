<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Distributor</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        #telepon {
            width: 21%;
        }
        #no {
            width: 5%;
        }

        #kode {
            width: 15%
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
            <h1 class="text-center">Data Distributor</h1>
            <p class="text-center" id="tanggal">
                @php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                 Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
        </header>
        <table class="table table-bordered" style="width:100%">
            <thead>
                <th>No</th>
                <th>Kode Distributor</th>
                <th>Nama Distributor</th>
                <th>Alamat Distributor</th>
                <th>Telepon</th>
            </thead>
            <tbody>
                @foreach ($distributor as $item)
                    <tr>
                        <td id="no">{{ $loop->iteration }}</td>
                        <td id="kode">{{ $item->kode_distributor }}</td>
                        <td>{{ $item->nama_distributor }}</td>
                        <td>{{ $item->alamat_distributor }}</td>
                        <td id="telepon">{{ $item->telepon_distributor }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
