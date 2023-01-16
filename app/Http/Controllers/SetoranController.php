<?php

namespace App\Http\Controllers;

use App\Models\Setoran;
use App\Models\Customer;
use App\Models\DetailProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setoran = Setoran::all();
        $customer = DB::table('customers')->select('nama_customer', 'id')->get();
        $profil = DetailProfil::where('user_id', Auth::user()->id)->get();
        return view('menu.setoran', compact('setoran', 'customer', 'profil'));
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
        $data = $request->all();
        $data['foto_dep'] = $request->file('foto_dep')->store('foto');
        Setoran::create($data);
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
        $setoran->update($request->all());
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
        $setoran->delete();
        return redirect('setoran');
    }
}
