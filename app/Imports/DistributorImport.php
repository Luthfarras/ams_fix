<?php

namespace App\Imports;

use App\Models\Distributor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DistributorImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $distributor = Distributor::where('kode_distributor', $row['kode_distributor'])->exists();
            $cari = Distributor::where('kode_distributor', $row['kode_distributor'])->first();

            if ($distributor == null) {
                Distributor::create([
                    'nama_distributor' => $row['nama_distributor'],
                    'kode_distributor' => $row['kode_distributor'],
                    'telepon_distributor' => $row['telepon_distributor'],
                    'alamat_distributor' => $row['alamat_distributor']
                ]);
            } elseif ($distributor != null) {
                $cari->update([
                    'nama_distributor' => $row['nama_distributor'],
                    'kode_distributor' => $row['kode_distributor'],
                    'telepon_distributor' => $row['telepon_distributor'],
                    'alamat_distributor' => $row['alamat_distributor']
                ]);
            }
        }
    }
}
