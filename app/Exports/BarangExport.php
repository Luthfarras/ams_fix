<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangExport implements FromCollection, WithMapping, ShouldAutoSize, WithStrictNullComparison, WithHeadings, WithStyles, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Harga Jual',
            'QTY',
            'Stok',
            'Satuan',
            'Harga Netto',
            'Keterangan',
            'Tanggal Kadaluarsa',
        ];
    }

    public function map($barang): array
    {
        return [
            $barang->kode_barang,
            $barang->nama_barang,
            $barang->harga_jual,
            $barang->qty_barang,
            $barang->stok,
            $barang->satuan->nama_satuan,
            $barang->harga_netto,
            $barang->ket_barang,
            $barang->tgl_kadaluarsa,
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
