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
        // Mengambil seluruh data yang ada dalam tabel Stok
        $stok = Stok::all();

        // Mengambil seluruh data yang ada dalam tabel Barang
        $barang = Barang::all()->sortBy('nama_barang');

        // Mengambil seluruh data yang ada dalam tabel Distributor
        $dist = Distributor::all()->sortBy('nama_distributor');


        $jumlah = DB::table('stoks')->select('stok_masuk')->sum('stok_masuk');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
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

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'stok_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'distributor_id' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Data Stok', 'error');
        } 
        
        // Jika berhasil
        else {
            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Stok', 'success');

            // Stok akan menyimpan semua yang ada dalam Form
            Stok::create($request->all());
        }

        // Tabel barang akan mengupdate stok
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

        // Menghapus data yang ada dalam tabel stok
        $stok->delete();

        // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Stok', 'success');

        // Dialihkan ke halaman stok
        return redirect('stok');
    }

    public function printStok()
    {
        // Mengambil seluruh data yang ada dalam tabel Stok
        $stok = Stok::all()->sortBy('tanggal_masuk');

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.stokprint', ['stok' => $stok]);

        // PDF akan ditampilkan secara stream dengan ukuran A4-potrait dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'potrait')->stream('Data Stok - '. Carbon::now(). '.pdf');
    }
}
