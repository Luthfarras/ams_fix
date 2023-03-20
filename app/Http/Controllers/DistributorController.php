<?php

namespace App\Http\Controllers;

use App\Exports\DistributorExport;
use App\Imports\DistributorImport;
use Carbon\Carbon;
use App\Models\Distributor;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Distributor
        $dist = Distributor::all();

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman distributor dengan membawa data yang sudah di deklarasikan
        return view('pendataan.distributor', compact('dist', 'profil'));
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
            'nama_distributor' => 'required',
            'kode_distributor' => 'required|unique:distributors',
            'telepon_distributor' => 'required',
            'alamat_distributor' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal 
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Data Distributor', 'error');
        } 
        
        // Jika berhasil
        else {
            // Menampilkan Alert Sukses
            Alert::toast('Berhasil Menyimpan Data Distributor', 'success');

            // Dan Data akan disimpan ke dalam database
            Distributor::create($request->all());
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman distributor
        return redirect('distributor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {

        // Membuat Validasi
        $validator = Validator::make($request->all(), [
            'nama_distributor' => 'required',
            'kode_distributor' => 'required',
            'telepon_distributor' => 'required',
            'alamat_distributor' => 'required',
        ]);

         // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Mengubah Data Distributor', 'error');

        } 

        // Jika berhasil
        else {
            // Menampilkan Alert Sukses
            Alert::toast('Berhasil Mengubah Data Distributor', 'success');

            // Dan Data akan diupdate ke dalam database
            $distributor->update($request->all());
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman distributor
        return redirect('distributor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        // Menghapus data yang ada dalam tabel Distributor
        $distributor->delete();

        // Menampilkan Alert Sukses
        Alert::toast('Berhasil Menghapus Data Distributor', 'success');

        // Dialihkan ke halaman distributor
        return redirect('distributor');
    }

    public function printDist()
    {

        // Mengambil seluruh data yang ada dalam tabel distributor 
        $distributor = Distributor::all()->sortBy('nama_distributor');

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.distprint', ['distributor' => $distributor]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Potrait dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Distributor - '. Carbon::now(). '.pdf');
    }

    public function distributorExport()
    {
        return Excel::download(new DistributorExport, 'DistributorExport.xlsx');
    }

    public function distributorImport(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new DistributorImport, $file);

        Alert::toast('Berhasil Mengimport Data Satuan', 'success');

        return redirect('distributor');
    }
}
