<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailProfil;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        Barang::create($request->all());
        Alert::toast('Berhasil Menyimpan Data Barang', 'success');
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
        $barang->update($request->all());
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
}
