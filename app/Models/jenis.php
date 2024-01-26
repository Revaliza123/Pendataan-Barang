<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_jenis'
    ];
    public function Jenis()  {
        return $this->hasMany(barang::class,'id','jenis_id');
    }
}
