<?php

namespace App\Exports;

use App\Models\Satuan;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SatuanExport implements FromCollection, WithMapping, ShouldAutoSize, WithStrictNullComparison, WithHeadings, WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Satuan::all();
    }

    public function map($satuan): array
    {
        return [
            $satuan->nama_satuan,
           
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Satuan',
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
