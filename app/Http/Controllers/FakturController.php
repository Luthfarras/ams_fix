<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Faktur;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\DetailFaktur;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FakturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faktur = Faktur::all();
        $detail = DetailFaktur::all();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('faktur.faktur', compact('faktur', 'detail', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cust = Customer::all();
        $barang = Barang::all();
        $detail = DetailFaktur::all();
        $dfaktur = $detail->unique('kode_faktur');
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('faktur.tambah', compact('cust', 'barang', 'detail', 'dfaktur', 'profil'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (DB::table('fakturs')->where('kode_faktur', $request->kode_faktur)->exists()) {
            Alert::error('Oops..', 'Invoice sudah terdaftar');
            return redirect('faktur/create');
        }else {
            $data = $request->all();
            $data['total_harga'] = 0;
            Faktur::create($data);

            $faktur = Faktur::latest()->first()->id; // Mengambil ID terakhir (Angkanya saja)
            $fakturs = Faktur::where('id', $faktur)->first(); // Mengambil data dari ID Terbaru
           
            $total = 0;

            $price = DB::table('detail_fakturs')->select('subtotal')->where('detail_fakturs.kode_faktur', $fakturs->kode_faktur)->get();

            foreach ($price as $item) {
                $total += $item->subtotal;
            }

            $fakturs->update([
                'total_harga' => $total,
            ]);

            Penjualan::create([
                'customer_id' => $request->customer_id,
                'tanggal_kirim' => $request->tanggal_faktur,
                'kode' => $fakturs->kode_faktur,
                'jumlah' => $total,
                'keterangan' => $request->ket_faktur,
            ]);
            
            return redirect('faktur');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function show(Faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faktur  $faktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faktur $faktur)
    {
        //
    }
    public function getNama($id)
    {
        $data = DetailFaktur::join('customers', 'customers.id', 'detail_fakturs.customer_id')->where('detail_fakturs.kode_faktur', $id)->get();
        // $good = response()->json($data);
        // dd($good);
        return response()->json($data);
    }

    public function getTotal($id)
    {
        $data = DetailFaktur::join('customers', 'customers.id', 'detail_fakturs.customer_id')->where('detail_fakturs.kode_faktur', $id)->get();
        $total = 0;
        foreach ($data as $item) {
            $total += $item->subtotal;
        }
        // dd($total);
        return response()->json($data);
    }

    public function getBarang($id)
    {
        $data = DetailFaktur::join('barangs', 'barangs.id', 'detail_fakturs.barang_id')->where('detail_fakturs.kode_faktur', $id)->get();
        $li = '';
        foreach ($data as $item) {
            $li .= $item->nama_barang. ' &  ';
        }
        $li .= '';
        return response()->json([$li]);
    }
}
