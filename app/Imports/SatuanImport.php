<?php

namespace App\Imports;

use App\Models\Satuan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SatuanImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $satuan = Satuan::where('nama_satuan', $row['nama_satuan'])->exists();
            $cari = Satuan::where('nama_satuan', $row['nama_satuan'])->first();

            if ($satuan == null) {
                Satuan::create([
                    'nama_satuan' => $row['nama_satuan'],
                ]);
            } elseif ($satuan != null) {
                $cari->update([
                    'nama_satuan' => $row['nama_satuan'],
                ]);
            }
        }
    }
}
