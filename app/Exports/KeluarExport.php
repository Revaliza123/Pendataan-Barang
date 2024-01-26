<?php

namespace App\Exports;

use App\Models\keluar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeluarExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  query()
    {
        return keluar::query();
    }
    public function map($keluar): array
    {
        return [
            $keluar->id,
            $keluar->Brng->nama_barang,
            $keluar->tanggal,
            $keluar->jumlah,
            $keluar->satuan,
            $keluar->keterangan,  
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Tanggal',
            'Jumlah',
            'Satuan',
            'Keterangan',
        ];
    }
}

