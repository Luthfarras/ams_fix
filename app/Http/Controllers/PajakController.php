<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pajak;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data yang ada dalam tabel Pajak
        $pajak = Pajak::all();

        // Mengambil Data pada tabel Customer dengan kolom nama customer dan idnya saja
        $customer = DB::table('customers')->select('nama_customer', 'id')->get()->sortBy('nama_customer');
        
        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('menu.pajak', compact('pajak', 'customer', 'profil'));
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

        // Membuat Validdasi
        $validator = Validator::make($request->all(), [
            'kode_laporan' => 'required|unique:pajaks',
            'customer_id' => 'required',
            'tanggal_rep' => 'required',
            'no_fakpajak' => 'required',
            'tanggal_upload' => 'required',
            'ket_rep' => 'required',
        ]);
        
        // Jika Validator yang dideklarasikan ada salah satu yang gagal maka akan error
        if($validator->fails()){
            // Menampilkan Alert Error
            Alert::toast('Gagal Menyimpan Data Pajak', 'error');
        } 

        // Jika Berhasil
        else {
            // Menampilkan Alert Success
            Alert::toast('Berhasil Menyimpan Data Pajak', 'success');

            // Menyimpan seluruh data yang ada dalam form ke dalam tabel pajak
            Pajak::create($request->all());
        }

        // Jika salah satu kondisi sudah terpenuhi akan dialihkan ke halaman pajak
        return redirect('pajak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function show(Pajak $pajak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function edit(Pajak $pajak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pajak $pajak)
    {
        // Mengubah seluruh data yang ada dalam form ke dalam tabel pajak
        $pajak->update($request->all());

        // Menampilkan Alert Success
        Alert::toast('Berhasil Mengubah Data Pajak', 'success');

        // Dialihkan ke halaman Pajak
        return redirect('pajak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pajak  $pajak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pajak $pajak)
    {
        // Menghapus data yang ada dalam tabel pajak
        $pajak->delete();

        // Menampilkan Alert Success
        Alert::toast('Berhasil Menghapus Data Pajak', 'success');

        // Dialihkan ke halaman pajak
        return redirect('pajak');
    }

    public function printPajak()
    {
        // Mengambil seluruh data yang ada dalam tabel Pajak
        $pajak = Pajak::all();

        // Halaman PDF akan di load dengan membawa data yang sudah di deklarasikan
        $pdf = Pdf::loadView('print.pajakprint', ['pajak' => $pajak]);
        
        // PDF akan ditampilkan secara stream dengan ukuran A4-Landscape dan bisa didownload dengan nama yang sudah dideklarasikan
        return $pdf->setPaper('a4', 'landscape')->stream('Data Laporan Faktur Pajak - '. Carbon::now(). '.pdf');
    }
}
