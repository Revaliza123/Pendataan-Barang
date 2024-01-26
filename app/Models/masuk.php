<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    use HasFactory;

    protected $table = 'masuk';
    protected $primaryKey = 'id';
    protected $filable = [
        'id',
        'id_barang',
        'tanggal',
        'jumlah',
        'satuan' ,
        'keterangan'
    ];

    public function Barang()
    {
        return $this->belongsTo(barang::class,'id_barang');
    }
}
