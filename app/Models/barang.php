<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $filable = [
        'id',
       ' nama_barang',
        'deskripsi',
        'stock',
        'jenis_id',
    ];

    public function Masuk()  {
        return $this->hasMany(masuk::class,'id_barang');
    }
    public function Keluar()  {
        return $this->hasMany(keluar::class,'id_barang');
    }
    public function Jenis()  {
        return $this->belongsTo(jenis::class,'jenis_id');
    }
}
