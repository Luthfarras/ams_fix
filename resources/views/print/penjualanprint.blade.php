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
        .text-center {
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
        .text-warna {
            color: red;
        }
        .footer {
            margin-top: 2%;
            display: grid;
            grid-auto-columns: 10%;
        }
        .kosong {
            text-align: center;
            margin-top: 30%;
            font-size: 60px;
        }
    </style>
</head>

<body>
    @if (DB::table('penjualans')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->exists() || $id == 0)
        <div class="container">
            <header>
                <h1 class="text-center">Data Penjualan</h1>
                <p class="text-center">
                    @php
                        setlocale(LC_ALL, 'IND');
                        $data = strftime('%A, %d %B %Y');
                    @endphp
                    Dicetak : <span class="text-warna">{{ $data }}</span>
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
                                <td class="text-warna">{{ $item->status }}</td>
                            @else 
                                <td>{{ $item->status }}</td>
                            @endif
                        </tr>
                        
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="border: 2px solid;">
                        <th colspan="4">Jumlah</th>
                        <th>Rp {{ number_format($pertahun, 0, ',', '.') }}</th>
                        <th colspan="2"></th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6" class="text-warna">Belum Lunas</th>
                        <th class="text-warna">{{ $belum }}</th>
                    </tr>
                    <tr style="border: 2px solid;">
                        <th colspan="6">Sudah Lunas</th>
                        <th>{{ $lunas }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="page-break">
            <h1 class="text-center">Data Penjualan Tahunan @if (!$id == 0) {{ $id }} @endif</h1>
            <p class="text-center">
                @php
                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                    $data = strftime('%A, %d %B %Y');
                @endphp
                Dicetak : <span class="text-warna">{{ $data }}</span>
            </p>
            <table class="table table-bordered">
                <thead>
                    <th>Bulan</th>
                    <th class="cust">Total</th>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            setlocale(LC_ALL, 'id-ID', 'id_ID');
                            $month = strftime('%B', mktime(0, 0, 0, $i, 10)); 
                        @endphp        
                        <tr>
                            <td>{{ $month }}</td>
                            <td class="fw-bold">
                                @if (!$id == 0)
                                Rp {{ number_format($result[$i], 0, ',', '.') }}
                                @else
                                Rp {{ number_format($hasil[$i], 0, ',', '.') }}
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot>
                    <th>Jumlah</th>
                    <th>Rp {{ number_format($pertahun, 0, ',', '.') }}</th>
                </tfoot>
            </table>
        </div>
    @else
    <h1 class="kosong">DATA TIDAK DITEMUKAN</h1>
    @endif
</body>

</html>
