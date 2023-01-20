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
        #telepon {
            width: 21%;
        }
        #no {
            width: 5%;
        }

        #kode {
            width: 15%
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 class="text-center">Data Distributor</h1>
        </header>
        <table class="table table-bordered">
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
