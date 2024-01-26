<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\masuk;
use App\Models\keluar;
use App\Models\jenis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $barang = barang::count();
        $masuk = masuk::count();
        $keluar = keluar::count();
        $jenis = jenis::count();
        return view('/admin/home',compact('barang','masuk','keluar','jenis'));
    }
}
