<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penjualan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Penjualan
        $penjualan = Penjualan::all();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Menjumlahkan tabel penjualan pada kolom harga jumlah
        $jumlah = DB::table('penjualans')->select('jumlah')->sum('jumlah');

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('menu.penjualan', compact('penjualan', 'profil', 'jumlah'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        Alert::toast('Berhasil Menghapus Data Penjualan', 'success');
        return redirect('penjualan');
    }

    public function status(Penjualan $penjualan)
    {
        if ($penjualan->status == 'Belum Lunas') {
            $penjualan->update([
                'status' => "Lunas"
            ]);
        }else {
            $penjualan->update([
                'status' => "Belum Lunas"
            ]);
        }
        return redirect('penjualan');
    }

    public function printPenjualan()
    {
        // Mengambil seluruh data yang ada dalam tabel Penjualan
        $penjualan = Penjualan::all();

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.penjualanprint', ['penjualan' => $penjualan]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Potrait dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'potrait')->stream('Data Penjualan - '. Carbon::now(). '.pdf');
    }
}
