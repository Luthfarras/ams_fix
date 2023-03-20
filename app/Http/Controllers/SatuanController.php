<?php

namespace App\Http\Controllers;

use App\Exports\SatuanExport;
use App\Imports\SatuanImport;
use App\Models\Satuan;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Distributor
        $satuan = Satuan::all()->sortBy('nama_satuan');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('pendataan.satuan', compact('satuan', 'profil'));
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
        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuans',
        ]);

        // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if ($validator->fails()) {
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Data Satuan', 'error');

        }
        
        // Jika berhasil
        else {
            // Mengambil seluruh data yang ada dalam form
            $data = $request->all();

            // Menyimpan isi data ke dalam database
            Satuan::create($data);

            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Satuan', 'success');
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman satuan
        return redirect('satuan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Satuan $satuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satuan $satuan)
    {
        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'nama_satuan' => 'required|unique:satuans',
        ]);

        // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if ($validator->fails()) {
            Alert::toast('Gagal Mengubah Data Satuan', 'error');
        }
        
        // Jika berhasil
        else {

            // Mengambil seluruh data yang ada dalam form
            $data = $request->all();

            // Menupdate data ke dalam database
            $satuan->update($data);

            // Menampilkan Alert Success
            Alert::toast('Berhasil Mengubah Data Satuan', 'success');
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman satuan
        return redirect('satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        // Menghapus data yang ada dalam tabel satuan
        $satuan->delete();

         // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Satuan', 'success');

        // Dialihkan ke Halaman Satuan
        return redirect('satuan');
    }

    public function satuanExport()
    {
        return Excel::download(new SatuanExport, 'SatuanExport.xlsx');
    }

    public function satuanImport(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new SatuanImport, $file);

        Alert::toast('Berhasil Mengimport Data Satuan', 'success');

        return redirect('satuan');
    }
}
