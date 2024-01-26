<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keluar;
use App\Models\barang;
use Carbon\Carbon;
use App\Exports\KeluarExport;
use Maatwebsite\Excel\Facedes\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;



class KeluarController extends Controller
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
            
            $keluar = keluar::where('tanggal', $date)->paginate(10);
        }else{
            $keluar = keluar::with('Brng')->whereHas('Brng',function($query) use($Search) {
                $query->where('nama_barang','LIKE','%'.$Search.'%');
            })
            ->orWhere('satuan','LIKE','%'.$Search.'%') 
            ->paginate(10);
        }
        // $Search = $request->Search;
        // $date =$request->date;
        // $barang = barang::all();
        // $keluar = keluar::with('Brng')->whereHas('Brng',function($query) use($Search) {
        //     $query->where('nama_barang','LIKE','%'.$Search.'%');
        // })
        // ->orWhere('tanggal','LIKE','%'.$date.'%')
        // ->orWhere('satuan','LIKE','%'.$Search.'%') 
        //         ->paginate(10);
        return view('/admin/keluar/data-keluar',compact('keluar','date','barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keluar = keluar::with('Brng')->get();
        return view('/admin/keluar/keluar-add',compact('keluar'));
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

        $keluar = new keluar;
        $keluar->id_barang = $request->id_barang;
        $keluar->tanggal = $request->tanggal;
        $keluar->jumlah = $request->jumlah;
        $keluar->satuan = $request->satuan;
        $keluar->keterangan = $request->keterangan;
        $keluar->save();
        if($keluar) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil menambahkan data barang keluar');
        }
        return redirect('/admin/keluar/data-keluar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    function pdf($id)  {
        $keluar = keluar::with('Brng')->findOrFail($id);
        $pdf = Pdf::loadView('/admin/keluar/cetak-pdf-keluar',['keluar' => $keluar]);
        return $pdf->download('invoice-barang-keluar'.Carbon::now()->timestamp.'.pdf');
        return view('/admin/keluar/cetak-pdf-keluar',['keluar' => $keluar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $keluar = keluar::with('Brng')->findOrFail($id);
        $barang = barang::where('id','!=',$keluar->id_barang)->get(['id','nama_barang']);
        return view('/admin/keluar/keluar-edit',compact('keluar','barang'));
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

        $keluar = keluar::findOrFail($id);
        $keluar->id_barang = $request->id_barang;
        $keluar->tanggal = $request->tanggal;
        $keluar->jumlah = $request->jumlah;
        $keluar->satuan = $request->satuan;
        $keluar->keterangan = $request->keterangan;
        $keluar->save();
        if($keluar) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil mengedit data barang keluar');
        }
        return redirect('/admin/keluar/data-keluar');
    }

    public function delete($id)  {
        $keluar = keluar::with('Brng')->findOrFail($id);
        return view('/admin/keluar/keluar-delete',compact('keluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deletekeluar = keluar::findOrFail($id);
        $deletekeluar->delete();
        if($deletekeluar) {
            Session::flash('status','success');
            Session::flash('message','Anda berhasil menghapus data barang keluar');
        }
        return redirect('/admin/keluar/data-keluar');
    }
    public function export()
    {
     return (new KeluarExport)->download('Data-Keluar-'.Carbon::now()->timestamp.'.xlsx');
    }

    function filterDate(Request $request) {
        $start_date =$request->start_date;
        $end_date =$request->end_date;

        $keluar = keluar::where('tanggal','>=',$start_date)
                        ->orWhere('tanggal','<=',$end_date)
                        ->paginate(10);

        return view('/admin/keluar/data-keluar',compact('keluar'));
    }
    // public function search() {
    //     $output.=""; 
    //     $Search = $request->Search;
    //     $keluar = keluar::with('Brng')->whereHas('Brng',function($query) use($Search) {
    //         $query->where('nama_barang','LIKE','%'.$Search.'%');
    //     })
    //     ->orWhere('satuan','LIKE','%'.$Search.'%') 
    //             ->paginate(10);
    //     foreach($keluar as $keluar){
    //         $output=
    //         '<tr>
    //         <td>'.$keluar->Brng->nama_barang.'</td>
    //         </tr>';
    //     }
    //     return response($output);
    // }
}
