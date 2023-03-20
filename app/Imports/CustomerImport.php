<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'nama_customer' => $row['nama_customer'],
            'kode_customer' => $row['kode_customer'],
            'telepon_customer' => $row['telepon_customer'],
            'alamat_customer' => $row['alamat_customer'],
        ]);
    }
}
