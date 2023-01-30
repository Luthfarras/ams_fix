<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Setoran;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Setoran
        $setoran = Setoran::all();

        // Mengambil seluruh data yang ada dalam tabel Customer
        $cust = Customer::all();

        // Mengambil Data pada tabel Customer dengan kolom nama customer dan idnya saja
        $customer = DB::table('customers')->select('nama_customer', 'id')->get()->sortBy('nama_customer');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('menu.setoran', compact('cust','setoran', 'customer', 'profil'));
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
        // Mengambil data yang ada di dalam form
        $data = $request->all();

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'kode_dep' => 'required|unique:setorans',
            'customer_id' => 'required',
            'tanggal_dep' => 'required',
            'jumlah_masuk' => 'required',
            'jumlah_keluar' => 'required',
            'ket_dep' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if ($validator->fails()) {
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Data Setoran', 'error');
        }
        
        // Jika berhasil
        else {
            // Sebagai Variabel penampung nama file
            $newName = '';

            // Jika didalam form terdapat file foto
            if($request->file('foto_dep')){

                // Mengambil ekstensi original foto
                $extension = $request->file('foto_dep')->getClientOriginalExtension();

                // Dilakukan perubahan nama file yang diambil dari Nama, Timestamp dan Ekstensi
                $newName = $request->kode_dep.'-'.now()->timestamp.'.'.$extension;

                 // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
                $isi = $request->file('foto_dep')->storeAs('img', $newName);
                
                // Kolom Foto akan diisi dengan variabel $isi
                $data['foto_dep'] = $isi;
            } else {
                $data['foto_dep'] = "-";
            };
    

            // Data akan dibuat ke tabel Setoran
            Setoran::create($data);
    
            // Tabel Penjualan juga akan dibuat berdasarkan data dan kolom yang ditentukan sendiri
            Penjualan::create([
                'customer_id' => $request->customer_id,
                'tanggal_kirim' => $request->tanggal_dep,
                'kode' => $request->kode_dep,
                'jumlah' => $request->jumlah_masuk,
                'keterangan' => $request->ket_dep,
            ]);

            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Setoran', 'success');
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman setoran
        return redirect('setoran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setoran  $setoran
     * @return \Illuminate\Http\Response
     */
    public function show(Setoran $setoran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setoran  $setoran
     * @return \Illuminate\Http\Response
     */
    public function edit(Setoran $setoran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setoran  $setoran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setoran $setoran)
    {
        // Mengambil data yang ada dalam seluruh form
        $data = $request->all();

        // Sebagai Variabel Penampung Nama File
        $newName = '';

        // Jika foto akan diganti
        if ($request->file('foto_dep')) {   
            // Foto yang didalam database akan dihapus 
            Storage::delete($setoran->foto_dep);
            
            // Mengambil ekstensi dari foto yang diinput
            $extension = $request->file('foto_dep')->getClientOriginalExtension();

            // Mengganti nama file dengan Nama - timestamp - dan ekstensi
            $newName = $request->kode_dep . '-' . now()->timestamp . '.' . $extension;

            // Menyimpan file ke dalam folder img dengan nama yang sudah dideklarasikan
            $isi = $request->file('foto_dep')->storeAs('img', $newName);
            
            // Kolom foto akan diisi oleh variabel $isi
            $data['foto'] = $isi;
            
            // Setelah itu dilakukan update data
            $setoran->update($data);
        } 
        // Jika tidak ada pergantian foto, maka foto diisi dengan foto yang sudah ada dalam database
        else {
            $data['foto_dep'] = $setoran->foto_dep;
            $setoran->update($data);
        }

        // Menampilkan Alert Sukses
        Alert::toast('Berhasil Mengubah Data Setoran', 'success');

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman Setoran
        return redirect('setoran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setoran  $setoran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setoran $setoran)
    {
        // Foto yang didalam database akan dihapus 
        Storage::delete($setoran->foto_dep);

        // Menghapus data yang ada dalam tabel setoran
        $setoran->delete();

         // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Setoran', 'success');

        // Dialihkan ke halaman setoran
        return redirect('setoran');
    }

    public function printSetoran()
    {
        // Mengambil seluruh data yang ada dalam tabel Setoran
        $setoran = Setoran::all();

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.setoranprint', ['setoran' => $setoran]);

        // PDF akan ditampilkan secara stream dengan ukuran A4-Potrait dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Setoran - '. Carbon::now(). '.pdf');
    }
}
