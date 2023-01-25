<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $satuan = Satuan::all();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        $jual = DB::table('barangs')->select('harga_jual')->sum('harga_jual');
        $stok = DB::table('barangs')->select('stok')->sum('stok');
        $netto = DB::table('barangs')->select('harga_netto')->sum('harga_netto');
        $qty = DB::table('barangs')->select('qty_barang')->sum('qty_barang');
        return view('pendataan.barang', compact('barang', 'jual', 'stok', 'netto', 'qty', 'profil', 'satuan'));
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
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barangs',
            'kode_harga' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'qty_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga_netto' => 'required',
            'ket_barang' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        if($validator->fails()){
            Alert::toast('Gagal Menyimpan Data Barang', 'error');
        } else {
            Barang::create($request->all());
            Alert::toast('Berhasil Menyimpan Data Barang', 'success');
        }

        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barangs',
            'kode_harga' => 'required|unique:barang',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'qty_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga_netto' => 'required',
            'ket_barang' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

        if($validator->fails()){
            Alert::toast('Gagal Mengubah Data Barang', 'error');
        } else {
            Alert::toast('Berhasil Mengubah Data Barang', 'success');
            $barang->update($request->all());
        }

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        Alert::toast('Berhasil Menghapus Data Barang', 'success');
        return redirect('barang');
    }

    public function printBarang()
    {
        $barang = Barang::all();
        $jumlahstok = DB::table('barangs')->select('stok')->sum('stok');
        $jumlahjual = DB::table('barangs')->select('harga_jual')->sum('harga_jual');
        $jumlahnetto = DB::table('barangs')->select('harga_netto')->sum('harga_netto');
        $pdf = Pdf::loadView('print.barangprint', ['barang' => $barang, 'jumlahstok' => $jumlahstok, 'jumlahjual' => $jumlahjual, 'jumlahnetto' => $jumlahnetto]);
        
        return $pdf->setPaper('a4', 'landscape')->stream('Data Barang - '. Carbon::now(). '.pdf');
    }
}
