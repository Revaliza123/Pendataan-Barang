<?php

namespace App\Exports;

use App\Models\jenis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class JenisExport implements FromQuery,WithMapping,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  query()
    {
        return jenis::query();
    }
    public function map($jenis): array
    {
        return [
            $jenis->id,
            $jenis->nama_jenis,  
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama_jenis',
            
        ];
    }
}
