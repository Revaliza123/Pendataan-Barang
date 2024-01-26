<?php

namespace App\Exports;

use App\Models\barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class BarangExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  query()
    {
        return barang::query();
    }
    public function map($barang): array
    {
        return [
            $barang->id,
            $barang->nama_barang,
            $barang->deskripsi,
            $barang->stock,
            ($barang->created_at),
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Deskripsi',
            'Stock'
        ];
    }
}
