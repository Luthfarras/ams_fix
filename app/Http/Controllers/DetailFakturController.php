<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\DetailFaktur;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DetailFakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada pada tabel Detail Faktur
        $detail = DetailFaktur::all();

        // Mengambil seluruh data yang ada pada tabel Barang
        $barang = Barang::all();
        
        // Mengambil seluruh data yang ada pada tabel Customer
        $cust = Customer::all()->sortBy('nama_customer');
        
        // Mengambil seluruh data yang ada pada tabel Stok
        $stok = Stok::all();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman detail faktur dengan membawa data yang sudah dideklarasikan
        return view('faktur.detailfaktur', compact('detail', 'barang', 'cust', 'stok', 'profil'));
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
        // Data yang ada dalam form akan diambil semua
        $data = $request->all();

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'kode_faktur' => 'required',
            'tanggal_keluar' => 'required',
            'barang_id' => 'required',
            'stok_keluar' => 'required',
            'diskon' => 'required',
            'subtotal' => 'required',
            'customer_id' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Detail Faktur', 'error');
        } 
        
        // Jika Berhasil
        else {
            // Tabel barang akan diambil sesuai id pada isi form barang_id
            $barang = Barang::find($request->barang_id);

            // Setelah itu akan dilakukan update di tabel barang kolom stok
            $barang->update([
                'stok' => $barang->stok - $request->stok_keluar,
            ]);

            // Menyimpan Data yang ada dalam variabel data ke dalam tabel Detail Faktur
            DetailFaktur::create($data);

            // Menampilkan Alert Sukses
            Alert::toast('Berhasil Menyimpan Detail Faktur', 'success');
        }
        
        // Setelah salah satu kondisi terpenuhi maka akan dialihkan ke halaman detail faktur
        return redirect('detailfaktur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailFaktur  $detailFaktur
     * @return \Illuminate\Http\Response
     */
    public function show(DetailFaktur $detailfaktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailFaktur  $detailFaktur
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailFaktur $detailFaktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailFaktur  $detailFaktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailFaktur $detailFaktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailFaktur  $detailFaktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailFaktur $detailfaktur)
    {
        // Tabel Barang akan dicari melalui barang id yang ada dalam tabel Detail Faktur
        $barang = Barang::find($detailfaktur->barang_id);

        // Tabel barang kolom stok akan dilakukan update
        $barang->update([
            'stok' => $barang->stok + $detailfaktur->stok_keluar,
        ]);

        // Setelah itu Data yang ada dalam tabel detail faktur akan dihapus
        $detailfaktur->delete();

        // Jika berhasil akan menampilkan alert sukses
        Alert::toast('Berhasil Menghapus Detail Faktur', 'success');

        // Dialihkan ke halaman detail faktur
        return redirect('detailfaktur');
    }

    public function getHarga()
    {
        // Mengambil seluruh data yang ada dalam tabel barang
        $barang = Barang::all();

        // Setelah itu mengembalikannya dalam bentuk respon dan datanya dimuat dalam bentuk JSON
        return response()->json($barang);
    }

    public function getBarang($id)
    {
        // Mengambil seluruh data yang ada dalam tabel barang dengan kondisi idnya harus sama dengan id request
        $data = Barang::where('id', $id)->get();

         // Setelah itu mengembalikannya dalam bentuk respon dan datanya dimuat dalam bentuk JSON
        return response()->json($data);
    }
}
