<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Customer</title>
    	<!--begin::Global Stylesheets Bundle(used by all pages)-->
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
            <h1 class="text-center">Data Customer</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                 Dicetak pada : <span class="text-warna">{{ $data }}</span>
            </p>
        </header>
        <table class="table" style="width: 100%">
            <thead>
                <th>No</th>
                <th>Kode Customer</th>
                <th>Nama Customer</th>
                <th>Alamat Customer</th>
                <th>Telepon</th>
            </thead>
            <tbody>
                @foreach ($customer as $item)
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
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('met/dist/assets/js/scripts.bundle.js') }}"></script>
</html>
