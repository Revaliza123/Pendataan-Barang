<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\barang;
use Carbon\Carbon;
use App\Exports\BarangExport;
use App\Models\jenis;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facedes\Excel;
use Illuminate\Validation\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Search = $request->Search;
        $jenis = $request->jenis;
        $pilihanJenis = jenis::all();

        if(isset($jenis)){
            
            $barang = barang::where('jenis_id', $jenis)->paginate(5);
        }else{
            $barang = barang::with('Jenis')->where('nama_barang', 'LIKE', '%'.$Search.'%' )
            ->orWhere('stock','LIKE','%'.$Search.'%')
            ->orWhereHas('Jenis',function($query) use($Search){
                $query->where('nama_jenis','LIKE','%'.$Search.'%');
            })
            ->Paginate(5);
        }
        
        return view('admin/barang/data-barang',compact('barang','Search','pilihanJenis','jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = jenis::all();
        $barang = barang::all();
        return view('/admin/barang/data-barang',compact('barang','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'max:30|required',
            'deskripsi' => 'max:40|required',
            'stock' => 'required',
            'jenis_id' => 'required'
        ]);

        $barang = new barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stock = $request->stock;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();

        if($barang) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil menambahkan data');
            
            Session::flash('status','failed');
            Session::flash('error','Anda gagal menambahkan data');
        }
        return redirect('/admin/barang/data-barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request $request,$id)
    {
        $jenis = jenis::with('Jenis')->get();
        $barang = barang::findOrFail($id);
        return view('/admin/barang/barang-edit',compact('barang', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_barang' => 'max:30|required',
            'deskripsi' => 'max:40|required',
            'stock' => 'required',
            'jenis_id' => 'required'
        ]);

        $barang = barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->stock = $request->stock;
        $barang->jenis_id = $request->jenis_id;
        $barang->save();
        if($barang) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil mengedit data');
        }
        return redirect('/admin/barang/data-barang');
    }

    public function delete($id)  {
        $barang = barang::findOrFail($id);
        return view('/admin/barang/data-delete',compact('barang'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletebarang = barang::findOrFail($id);
        $deletebarang->delete();
        if($deletebarang) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil delete data');
        }
        return redirect('/admin/barang/data-barang');
    }
    public function export()
    {
     return (new BarangExport)->download('barang-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function count() {
        $barang = barang::count();
        return view('/admin/home',compact('barang'));
    }
}
