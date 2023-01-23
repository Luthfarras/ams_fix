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
        $customer = Customer::all()->count();
        $distributor = Distributor::all()->count();
        $barang = Barang::all()->count();
        $stok = DB::table('barangs')->select('stok')->sum('stok');
        $penjualan = DB::table('penjualans')->select('jumlah')->sum('jumlah');
        $faktur = Faktur::all()->count();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        $notes = Notes::all();
        return view('home', compact('customer','distributor', 'barang', 'stok', 'penjualan', 'faktur', 'profil', 'notes'));
    }

    public function storeNotes(Request $request)
    {
        Notes::create($request->all());
        Alert::toast('Berhasil Menyimpan Notes', 'success');
        return redirect('home');
    }

    public function updateNotes(Request $request, Notes $notes)
    {
        $notes->update($request->all());
        Alert::toast('Berhasil Mengubah Notes', 'success');
        return redirect('home');
    }

    public function destroyNotes(Notes $notes)
    {
        $notes->delete();
        Alert::toast('Berhasil Menghapus Notes', 'success');
        return redirect('home');
    }
}
