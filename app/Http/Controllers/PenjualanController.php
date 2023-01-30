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
        $penjualan = Penjualan::all()->sortBy('tanggal_kirim');

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
        // Menghapus data yang ada dalam tabel penjualan
        $penjualan->delete();

        // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Penjualan', 'success');

        // Dialihkan ke halaman Penjualan
        return redirect('penjualan');
    }

    public function status(Penjualan $penjualan)
    {
        // Jika Status dalam tabel Notes 'Belum Lunas'
        if ($penjualan->status == 'Belum Lunas') {
            // Maka Status diubah ke 'Lunas'
            $penjualan->update([
                'status' => "Lunas"
            ]);

        }
        
        // Jika sebaliknya
        else {
            // Akan Diubah ke Belum Lunas
            $penjualan->update([
                'status' => "Belum Lunas"
            ]);
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman penjualan
        return redirect('penjualan');
    }

    public function printPenjualan($id)
    {
        if ($id == 0) {
            $penjualan = Penjualan::all()->sortBy('tanggal_kirim');
            $lunas = DB::table('penjualans')->select('status')->where('status', 'Lunas')->count();
            $belum = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->count();
            $pertahun = DB::table('penjualans')->select('jumlah')->sum('jumlah');
            $year = DB::table('penjualans')->get();
        }else {
            // Mengambil seluruh data yang ada dalam tabel Penjualan
            $penjualan = Penjualan::where(DB::raw('YEAR(tanggal_kirim)'), $id)->get()->sortBy('tanggal_kirim');
    
            $year = DB::table('penjualans')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->get();
    
            // Menghitung jumlah Status Lunas
            $lunas = DB::table('penjualans')->select('status')->where('status', 'Lunas')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->count();
    
            // Menghitung jumlah Status Belum Lunas
            $belum = DB::table('penjualans')->select('status')->where('status', 'Belum Lunas')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->count();
    
            // Menjumlahkan tabel penjualan pada kolom harga jumlah
            
            $pertahun = DB::table('penjualans')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->sum('jumlah');
        }

        foreach($year as $item){
            for ($i=1; $i <= 12 ; $i++) { 
                $result[$i] = 0;
            }
        }
        foreach($year as $dt){
            $bulan = date('n', strtotime($dt->tanggal_kirim));
            $result[$bulan] += $dt->jumlah;
        }

        foreach($penjualan as $item){
            for ($i=1; $i <= 12 ; $i++) { 
                $hasil[$i] = 0;
            }
        }
        foreach($penjualan as $dt){
            $bulan = date('n', strtotime($dt->tanggal_kirim));
            $hasil[$bulan] += $dt->jumlah;
        }



        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        if (DB::table('penjualans')->where(DB::raw('YEAR(tanggal_kirim)'), $id)->exists() || $id == 0) {
            $pdf = Pdf::loadView('print.penjualanprint', [
            'penjualan' => $penjualan, 
            'lunas' => $lunas, 
            'belum' => $belum, 
            'pertahun' => $pertahun,
            'id' => $id,
            'result' => $result,
            'hasil' => $hasil,
        ]);
        } else {
            $pdf = Pdf::loadView('print.penjualanprint', [
                'penjualan' => $penjualan, 
                'lunas' => $lunas, 
                'belum' => $belum, 
                'pertahun' => $pertahun,
                'id' => $id,
            ]);
        }
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Penjualan - '. Carbon::now(). '.pdf');
    }
}
