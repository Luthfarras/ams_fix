<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $satuan = Satuan::where('nama_satuan', $row['satuan'])->first();
            
            if ($satuan != null) {
                Barang::create([
                    'kode_barang' => $row['kode_barang'],
                    'nama_barang' => $row['nama_barang'],
                    'harga_jual' => $row['harga_jual'],
                    'qty_barang' => $row['qty'],
                    'stok' => $row['stok'],
                    'satuan_id' => $satuan['id'],
                    'harga_netto' => $row['harga_netto'],
                    'ket_barang' => $row['keterangan'],
                    'tgl_kadaluarsa' => $row['tanggal_kadaluarsa'],
                ]);
            }
        }
    }
   
}
