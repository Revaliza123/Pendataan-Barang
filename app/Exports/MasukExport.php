<?php

namespace App\Exports;

use App\Models\masuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasukExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  query()
    {
        return masuk::query();
    }
    public function map($masuk): array
    {
        return [
            $masuk->id,
            $masuk->Barang->nama_barang,
            $masuk->tanggal,
            $masuk->jumlah,
            $masuk->satuan,
            $masuk->keterangan,  
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

