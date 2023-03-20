<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Faktur</title>
    <style>
        @font-face {
            font-family: 'Letter Gothic Std Medium';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/LetterGothicStd.otf') }}) format("truetype");
        }
        @font-face {
            font-family: 'Letter Gothic Std Bold';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/Gothic-Bold.ttf') }}) format("truetype");
        }
        
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            font-family: 'Letter Gothic Std Medium';
        }
        .font {
            font-family: 'Letter Gothic Std Bold';
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
            font-family:'Letter Gothic Std Medium';
        }
        
        .left {
            width: 65%;
        }

        .right {
            width: 30%;
            margin-left: -2%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        p {
            margin-top: -1%;
            font-family:'Letter Gothic Std Medium';
        }
        .final {
            text-align: right;
            margin-top: -25px;
            margin-right: -3px;
        }
        .kiri {
            margin-top: -2%;
            margin-left: 20%;
            width: 20%;
            text-align: center;
        }

        .kanan { 
            margin-top: -2%;
            margin-left: 10%;
            width: 30%;
            text-align: center;
        }

        .hide {
            list-style-type: none;
            margin-top: -4%;
        }

        .nama {
            margin-top: 35%;
            text-align: center;
        }
        .nama2 {
            margin-top: 25%;
            text-align: center;
        }
        p.terbilang {
            padding: 7px;
            margin: 3px;
            margin-top: 0%;
            border-style: double;
            margin-right: 20%;
            margin-left: -10px;
        }

        .pinggir {
            width: 29%;
        }

    </style>
</head>

<body>
        <header>
            <h1 class="isi">INVOICE</h1>
        </header>
        <div class="row">
            <div class="col left">
                <p>CV. Anugerah Mitra Sejati
                    <br>Jl. Moch Juki No. 33
                    <br>Kec. Sukun Kel. Mulyorejo - Kota Malang 65147
                    <br>Telp. 0341 - 571270
                </p>
            </div>
            <div class="col right">
                @foreach ($kodenama as $item)
                    @php
                        setlocale(LC_ALL, 'id-ID', 'id_ID');
                        $tanggal = date_create($item->tanggal_faktur);
                        $data =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%d %B %Y');
                    @endphp
                <p>Malang, {{ $data }}
                    <br>Kepada Yth :
                    <br> {{ $item->nama_customer }}
                    <br> {{ $item->alamat_customer }}
                    @endforeach
                </p>
            </div>
        </div>

        <div class="h6" style="margin-top: -2%; margin-bottom: -1%; margin-left:-1px;">
            @foreach ($kodenama as $item)
                <p>Nomor Faktur : {{ $item->kode_faktur }}</p>
            @endforeach
        </div>
        <div class="container">
            <table style="width: 100%; font-family: 'Letter Gothic Std Medium';">
                <thead>
                    <td class="font">No</td>
                    <td class="font">Kode Barang</td>
                    <td class="font">Nama Barang</td>
                    <td class="font">Stn</td>
                    <td class="font">Qty</td>
                    <td class="font">Harga Stn</td>
                    <td class="font">Disc %</td>
                    <td class="font">Subtotal</td>
                </thead>
                <tbody>
                    @foreach ($faktur as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->nama_satuan }}</td>
                            <td>{{ $item->stok_keluar }}</td>
                            <td>{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                            <td>{{ $item->diskon }}</td>
                            <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col left">
                    <p style="margin-bottom: -3%; margin-left:-10px">Terbilang :</p> 
                    <br>
                        @php
                            function penyebut($nilai) {
                                $nilai = abs($nilai);
                                $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
                                $temp = "";
                                if ($nilai < 12) {
                                    $temp = " ". $huruf[$nilai];
                                } else if ($nilai < 20) {
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
                                    $temp = penyebut($nilai/1000000000) . " miliar" . penyebut(fmod($nilai,1000000000));
                                } else if ($nilai < 1000000000000000) {
                                    $temp = penyebut($nilai/1000000000000) . " triliun" . penyebut(fmod($nilai,1000000000000));
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
                        <p class="terbilang">{{ terbilang($item->total_pp) }} rupiah </p>
                    @endforeach 
                </div>
                <div class="col pinggir">
                    @foreach ($kodenama as $item)
                    <ul>
                        <li class="hide">Harga Jual 
                            <p class="final">{{ number_format($item->total_harga, 0, ',', '.') }}</p></li>
                        @if (!$item->ppn == 0)
                        <li class="hide">PPN 11% 
                            <p class="final"> {{ number_format($item->ppn, 0, ',', '.')  }}</p></li>
                        @endif
                        @if (!$item->pph == 0)
                        <li class="hide">PPH 1.5%
                            <p class="final"><{{ number_format($item->pph, 0, ',', '.')  }}</p></li>
                        @endif
                        <li class="hide" style="font-family:'Letter Gothic Std Bold';">Total Harga 
                            <p class="final" style="font-family:'Letter Gothic Std Bold';">Rp {{ number_format($item->total_pp, 0, ',', '.') }}</p</li>
                    </ul>
                    @endforeach
                </div>
            </div>

        <div class="container">
            <div class="col kiri">
                <p>Diterima Oleh : </p>
                <p class="nama">________________</p>
            </div>
            <div class="col kanan">
                <p>Hormat Kami :</p>
                @foreach ($profil as $item)
                    <p class="nama2">{{ $item->nama }}</p>
                @endforeach
            </div>
        </div>
        </div>
</body>

</html>
