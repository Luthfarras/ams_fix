<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Distributor;
use App\Models\Faktur;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $penjualan = Penjualan::all()->count();
        $faktur = Faktur::all()->count();
        if (!Auth::user()->role == 'Admin') {
            return redirect('/');
        }else {
            return view('home', compact('customer','distributor', 'barang', 'stok', 'penjualan', 'faktur'));
        }
    }
}
