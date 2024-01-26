<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class keluar extends Model
{
    use HasFactory;

    protected $table = 'keluar';
    protected $primaryKey = 'id';
    protected $filable = [
        'id',
        'id_barang',
        'tanggal',
        'jumlah',
        'satuan' ,
        'keterangan'
    ];
    public function Brng(): BelongsTo
    {
        return $this->belongsTo(barang::class,'id_barang','id');
    }
    
}
