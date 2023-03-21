<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToCollection, WithHeadingRow
{
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $customer = Customer::where('kode_customer', $row['kode_customer'])->exists();
            $cari = Customer::where('kode_customer', $row['kode_customer'])->first();

            if ($customer == null) {
                Customer::create([
                    'kode_customer' => $row['kode_customer'],
                    'nama_customer' => $row['nama_customer'],
                    'telepon_customer' => $row['telepon_customer'],
                    'alamat_customer' => $row['alamat_customer'],
                ]);
            } elseif ($customer != null) {
                $cari->update([
                    'kode_customer' => $row['kode_customer'],
                    'nama_customer' => $row['nama_customer'],
                    'telepon_customer' => $row['telepon_customer'],
                    'alamat_customer' => $row['alamat_customer'],
                ]);
            }
        }
    }
   
}
