<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromCollection, WithMapping, ShouldAutoSize, WithStrictNullComparison, WithHeadings, WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }

    public function map($customer): array
    {
        return [
            $customer->nama_customer,
            $customer->kode_customer,
            $customer->telepon_customer,
            $customer->alamat_customer,
            
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Customer',
            'Kode Customer',
            'Telepon Customer',
            'Alamat Customer',
        ];
    }

    public function styles(Worksheet $outlet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
            
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('1')
                                ->getAlignment()
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
            },
        ];
    }
}
