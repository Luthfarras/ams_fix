<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Faktur;
use App\Models\Customer;
use App\Models\DetailFaktur;
use Illuminate\Http\Request;

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
        return view('faktur.faktur', compact('faktur', 'detail'));
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
        return view('faktur.tambah', compact('cust', 'barang', 'detail', 'dfaktur'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
