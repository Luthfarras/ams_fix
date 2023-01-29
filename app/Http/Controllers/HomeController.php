<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Barang;
use App\Models\Faktur;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\Distributor;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Data yang ada dalam Tabel Customer akan dihitung seluruh datanya
        $customer = Customer::all()->count();

        // Data yang ada dalam Tabel Distributor akan dihitung seluruh datanya
        $distributor = Distributor::all()->count();

        // Data yang ada dalam Tabel Barang akan dihitung seluruh datanya
        $barang = Barang::all()->count();

        // Data yang ada dalam Tabel Faktur akan dihitung seluruh datanya
        $faktur = Faktur::all()->count();

        // Menjumlahkan tabel stok pada kolom harga stok
        $stok = DB::table('barangs')->select('stok')->sum('stok');

        // Menjumlahkan tabel penjualan pada kolom harga stok
        $penjualan = DB::table('penjualans')->select('jumlah')->sum('jumlah');

        // Mengambil detail profil dengan user_id dengan ID yang sudah login
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();

        // Jika Role yang login adalah Owner
        if (Auth::user()->role == 'Owner') {
            // Menampilkan seluruh data dalam tabel Owner
            $notes = Notes::all();
        } 
        // Selain itu
        else {
            // Hanya menampilkan data untuk yang login saja
            $notes = Notes::where('user_id', Auth::user()->id)->get();
        }

        // Masuk ke halaman home dengan membawa data yang sudah dideklarasikan
        return view('home', compact('customer','distributor', 'barang', 'stok', 'penjualan', 'faktur', 'profil', 'notes'));
    }

}
