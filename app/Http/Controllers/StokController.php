<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stok;
use App\Models\Barang;
use App\Models\Distributor;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = Stok::all();
        $barang = Barang::all();
        $dist = Distributor::all();
        $jumlah = DB::table('stoks')->select('stok_masuk')->sum('stok_masuk');
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('menu.stok', compact('stok', 'barang', 'dist', 'jumlah', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Mencari ID Barang yang diambil dari Request
        $barang = Barang::find($request->barang_id);

        // Stok Barang yang sudah ada akan dijumlahkan dengan isi Form yang diambil dari stok_masuk
        $stok = $barang->stok + $request->stok_masuk;

        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'stok_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'distributor_id' => 'required',
        ]);

        if($validator->fails()){
            Alert::toast('Gagal Menyimpan Data Stok', 'error');
        } else {
            // Stok akan menyimpan semua yang ada dalam Form
            Alert::toast('Berhasil Menyimpan Data Stok', 'success');
            Stok::create($request->all());
        }

        // TABLE barang akan mengupdate stok
        $barang->update([
            'stok' => $stok,
        ]);

        // Kembali ke halaman Stok
        return redirect('stok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stok $stok)
    {
        // Jika ID barang ada dan diambil dari ID Stok
        $barang = Barang::find($stok->barang_id);

        // Maka Table barang kolom stok barang dilakukan update dari (Table Barang kolom Stok) dikurangi dari (Table Stok kolom stok Masuk)
        $barang->update([
            'stok' => $barang->stok - $stok->stok_masuk,
        ]);

        // Setelah itu id stok akan dihapus
        $stok->delete();
        Alert::toast('Berhasil Menghapus Data Stok', 'success');
        return redirect('stok');
    }

    public function printStok()
    {
        $stok = Stok::all();
        $pdf = Pdf::loadView('print.stokprint', ['stok' => $stok]);
        
        return $pdf->setPaper('a4', 'potrait')->stream('Data Stok - '. Carbon::now(). '.pdf');
    }
}
