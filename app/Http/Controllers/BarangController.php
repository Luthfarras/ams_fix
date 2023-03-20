<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Imports\BarangImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
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
        // Mengambil seluruh Data pada tabel Barang
        $barang = Barang::all();

        // Mengambil seluruh Data pada tabel Satuan
        $satuan = DB::table('satuans')->select('id','nama_satuan')->get()->sortBy('nama_satuan');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Menjumlahkan tabel barang pada kolom harga jual
        $jual = DB::table('barangs')->select('harga_jual')->sum('harga_jual');

        // Menjumlahkan tabel barang pada kolom harga stok
        $stok = DB::table('barangs')->select('stok')->sum('stok');

        // Menjumlahkan tabel barang pada kolom harga harga_netto
        $netto = DB::table('barangs')->select('harga_netto')->sum('harga_netto');

        // Menjumlahkan tabel barang pada kolom harga qty
        $qty = DB::table('barangs')->select('qty_barang')->sum('qty_barang');

        // Masuk ke halaman barang dengan membawa data dengan variabel yang sudah di deklarasikan
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
        // Membuat validasi Data
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'qty_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga_netto' => 'required',
            'ket_barang' => 'required',
            'tgl_kadaluarsa' => 'required',
        ], [
            'kode_barang.unique' => 'Kode Barang sudah ada'
        ]);

        // Jika Validator yang dideklarasikan ada salah satu yang gagal
        if($validator->fails()){
            Alert::toast('Gagal Menyimpan Data Barang', 'error');
        } 

        // Jika berhasil
        else {
            // Menyimpan seluruh Data
            Barang::create($request->all());

            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Barang', 'success');
        }

        // Jika salah satu kondisi berhasil akan dialihkan ke halaman barang
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
        // Membuat Validasi Data
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'qty_barang' => 'required',
            'stok' => 'required',
            'satuan_id' => 'required',
            'harga_netto' => 'required',
            'ket_barang' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal 
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Mengubah Data Barang', 'error');
        } 
        
        // Jika berhasil
        else {
            // Menampilkan Alert Success
            Alert::toast('Berhasil Mengubah Data Barang', 'success');
            
            // Mengupdate data
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
        // Menghapus data yang ada dalam tabel barang
        $barang->delete();
        
        // Jika berhasil akan menampilkan Alert
        Alert::toast('Berhasil Menghapus Data Barang', 'success');

        // Dan dialihkan ke halaman barang /  Refresh halaman
        return redirect('barang');
    }

    public function printBarang()
    {
        // Menampilkan seluruh data dalam tabel barang
        $barang = Barang::all()->sortBy('nama_barang');

        // Menjumlahkan tabel barang pada kolom harga stok
        $jumlahstok = DB::table('barangs')->select('stok')->sum('stok');

        // Menjumlahkan tabel barang pada kolom harga harga_jual
        $jumlahjual = DB::table('barangs')->select('harga_jual')->sum('harga_jual');

        // Menjumlahkan tabel barang pada kolom harga harga_netto
        $jumlahnetto = DB::table('barangs')->select('harga_netto')->sum('harga_netto');

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.barangprint', ['barang' => $barang, 'jumlahstok' => $jumlahstok, 'jumlahjual' => $jumlahjual, 'jumlahnetto' => $jumlahnetto]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Barang - '. Carbon::now(). '.pdf');
    }

    public function barangExport()
    {
        return Excel::download(new BarangExport, 'BarangExport.xlsx');
    }

    public function barangImport(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new BarangImport, $file);

        Alert::toast('Berhasil Mengimport Data Barang', 'success');

        return redirect('barang');
    }
}
