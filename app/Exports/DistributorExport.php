<?php

namespace App\Exports;

use App\Models\Distributor;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DistributorExport implements FromCollection, WithMapping, ShouldAutoSize, WithStrictNullComparison, WithHeadings, WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Distributor::all();
    }

    public function map($distributor): array
    {
        return [
            $distributor->nama_distributor,
            $distributor->kode_distributor,
            $distributor->telepon_distributor,
            $distributor->alamat_distributor,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Distributor',
            'Kode Distributor',
            'Telepon Distributor',
            'Alamat Distributor',
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
