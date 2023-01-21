<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Faktur</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        
        h1 {
            text-align: center;
            
        }
        .isi {
            font-family: 'Courier New', Courier, monospace
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
        .col {
            float: left;
            padding: 10px;
        }
        
        .left {
            width: 70%;
        }

        .right {
            width: 25%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
        <header>
            <h1 class="isi">INVOICE</h1>
        </header>
        <div class="row">
            <div class="col left">
                <p>PT. Mitra Mulia Diagnostik
                    <br>Jl. Taman Sari Gg. Famili No. 13 RT.02 RW.01 Kel. Tamanan 
                    <br>Kec. Mojoroto - Kota Kediri 64116
                    <br>Telp./WA : 0813 3073 3590, 0856 2464 9945
                    <br>E-mail : mitramuliadiagnostik@gmail.com
                </p>
            </div>
            <div class="col right">
                @foreach ($kodenama as $item)
                <p>Malang, {{ $item->tanggal_faktur }}
                    <br>Kepada Yth :
                    <br> {{ $item->nama_customer }}
                    <br> {{ $item->alamat_customer }}
                    @endforeach
                </p>
            </div>
        </div>

        <div class="h6">
            @foreach ($kodenama as $item)
                No. {{ $item->kode_faktur }}
            @endforeach
        </div>
        <div class="container">
            <table style="width: 100%">
                <thead>
                    <th style="width: 3%">No</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Stn</th>
                    <th>Harga Stn</th>
                    <th>Disc %</th>
                    <th>Subtotal</th>
                </thead>
                <tbody>
                    @foreach ($faktur as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->stok_keluar }}</td>
                            <td>{{ $item->nama_satuan }}</td>
                            <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                            <td>{{ $item->diskon }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    Terbilang :
                    <br>
                    @php
                        function penyebut($nilai) {
                            $nilai = abs($nilai);
                            $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
                            $temp = "";
                            if ($nilai < 12) {
                                $temp = " ". $huruf[$nilai];
                            } else if ($nilai <20) {
                                $temp = penyebut($nilai - 10). " belas";
                            } else if ($nilai < 100) {
                                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                            } else if ($nilai < 200) {
                                $temp = " Seratus" . penyebut($nilai - 100);
                            } else if ($nilai < 1000) {
                                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                            } else if ($nilai < 2000) {
                                $temp = " Seribu" . penyebut($nilai - 1000);
                            } else if ($nilai < 1000000) {
                                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                            } else if ($nilai < 1000000000) {
                                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                            } else if ($nilai < 1000000000000) {
                                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                            } else if ($nilai < 1000000000000000) {
                                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                            }     
                            return $temp;
                        }
                    
                        function terbilang($nilai) {
                            if($nilai<0) {
                                $hasil = "minus ". trim(penyebut($nilai));
                            } else {
                                $hasil = trim(penyebut($nilai));
                            }     		
                            return $hasil;
                        }
                    @endphp
                    @foreach ($kodenama as $item)
                        {{ terbilang($item->total_harga) }} rupiah
                    @endforeach 
                </div>
            </div>
        </div>
</body>

</html>
