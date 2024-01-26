<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\masuk;
use App\Models\barang;
use Carbon\Carbon;
use App\Exports\MasukExport;
use Maatwebsite\Excel\Facedes\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;



class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Search = $request->Search;
        $date = $request->date;
        $barang = barang::all();
        if(isset($date)){
            
            $masuk = masuk::where('tanggal', $date)->paginate(10);
        }else{
            $masuk = masuk::with('Barang')->whereHas('Barang',function($query) use($Search) {
                $query->where('nama_barang','LIKE','%'.$Search.'%');
            })
            ->orWhere('satuan','LIKE','%'.$Search.'%') 
            ->paginate(10);
        }
        return view('admin/masuk/data-masuk',compact('masuk','barang','date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masuk = masuk::with('Barang')->get();
        return view('/admin/masuk/masuk-add',compact('masuk'));
    }

    public function barang()  {
        $masuk = masuk::all();
        return view('/admin/masuk/masuk-add',compact('masuk'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_barang' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'max:50'
        ]);

        $masuk = new masuk;
        $masuk->id_barang = $request->id_barang;
        $masuk->tanggal = $request->tanggal;
        $masuk->jumlah = $request->jumlah;
        $masuk->satuan = $request->satuan;
        $masuk->keterangan = $request->keterangan;
        $masuk->save();
        if($masuk) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil menambahkan data barang masuk');
        }
        return redirect('/admin/masuk/data-masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    function pdf($id)  {
        $masuk = masuk::with('Barang')->findOrFail($id);
        $pdf = Pdf::loadView('/admin/masuk/cetak-pdf',['masuk' => $masuk]);
        return $pdf->download('invoice-barang-masuk'.Carbon::now()->timestamp.'.pdf');
        // return view('/admin/masuk/cetak-pdf',['masuk' => $masuk]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request,$id)
    {
        $masuk = masuk::with('Barang')->findOrFail($id);
        $barang = barang::where('id','!=',$masuk->id_barang)->get(['id','nama_barang']);
        return view('/admin/masuk/masuk-edit',compact('masuk','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'id_barang' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'max:50'
        ]);

        $masuk = masuk::findOrFail($id);
        $masuk->id_barang = $request->id_barang;
        $masuk->tanggal = $request->tanggal;
        $masuk->jumlah = $request->jumlah;
        $masuk->satuan = $request->satuan;
        $masuk->keterangan = $request->keterangan;
        $masuk->save();
        if($masuk) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil mengedit data barang masuk');
        }
        return redirect('/admin/masuk/data-masuk');
    }

    public function delete($id)  {
        $masuk = masuk::with('Barang')->findOrFail($id);
        return view('/admin/masuk/masuk-delete',compact('masuk'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletemasuk = masuk::findOrFail($id);
        $deletemasuk->delete();
        if($deletemasuk) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil menghapus data barang masuk');
        }
        return redirect('/admin/masuk/data-masuk');
    }
    public function export()
    {
     return (new MasukExport)->download('Data-masuk-'.Carbon::now()->timestamp.'.xlsx');
    }
}


